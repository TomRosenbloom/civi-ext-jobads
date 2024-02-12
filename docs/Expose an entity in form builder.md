## Expose an entity in form builder

replacement text for https://docs.civicrm.org/dev/en/latest/step-by-step/create-entity/#7-add-a-form

working from https://docs.civicrm.org/dev/en/latest/afform/form-builder/

Add the mixin

'ensure...' - ??

create a php file...

add the following detail... - this is where it gets really confusing. The example shown is for the deduper extension where the entity name is ContactNamePair, not MyEntity as previously in this text. Also the given values entity, label and defaults seem possibly deprecated, or unnecessary at least? In the Pets example https://lab.civicrm.org/extensions/pets we use type, and boilerplate, and default, but defaults is empty. The list of examples at https://github.com/civicrm/civicrm-core/tree/master/ext/afform/admin/afformEntities has all sorts. Can't find any documentation on this i.e. what values like boilerplate etc do and what params they take...

[is there some kind of general rule that a 'declaration' is a php file that returns an array?]



## Add a Saved Search in Your Own Extension

this is the bit where you use SearchKit, or API4, to export the thing that goes in 'managed'

[another file that follows the pattern of a 'declaration' i.e. a php file that returns an array]

NB this is in a different order to the Pets example - in that example the managed entity declaration thing that defined an option group of pet types was done first, which is a bit illogical?

what is the 'managed' folder *for*? Why is it so called?



I added a submission form via the UI, but at what point does that become part of the extension?



Re-cap:

created the initial framework of folder in ext dir, and basic files like info.xml etc.

then a decision point - are you just looking to package a search, or do you want to create an entity?

generate entity - this is about creating a collection of declarations and classes which make up the framework needed for Civi to add and manage database table(s) and interact with them.

create afform entity - this is an additonal bit of framework that allows interaction with SK/FB 

question: can you created a packaged/managed search without the afform entities? Yes you can - just do the minimal extension directory creation, then do a SK search and export it into managed/SavedSearch_search_name.mgd.php (then cv flush - changes made to code just need a cache flush not an extension re-install). You can then add a display - add in UI, export, update mgd file, flush caches. But you can't add a FB form - I don't think. So how do you include a form in an extension? Does that require you to do the whole bit including creating an entity? No I don't think so - the 'general' entity is for database interaction, but the API4 entity is for FB forms - right? 

https://docs.civicrm.org/dev/en/latest/afform/afform-core/ - seems to be saying that adding forms to the extension is via ang folder etc.

go to FB page in UI, find the form, copy the name e.g. afsearchFooForm and make afsearchFooForm.aff.html and afsearchFooForm.aff.php in ang folder, then populate them with  (1) the html copied and pasted from 'markup' window of FB UI (2) something like https://lab.civicrm.org/extensions/pets/-/blob/master/ang/afsearchPets.aff.php?ref_type=heads

OR, civix export...

...this could be working, but we need to add some 'foos' first, so we need to make an 'add' form (foos are not in api4)

[Note that whereas in the SK UI there is a tab for your own (custom) SKs and one for packaged, the FB UI doesn't work in an analogous way - you have tabs for submission forms and search forms (and field blocks and system forms), but these are a mixture of ones defined in extensions and ones created locally. That's a bit confusing until you get used to it.]

As things stand, foos are not showing as something that can have a submission form, whereas job ads are - so what's the reason for this again... foos are not an API4 entity - they don't appear there either, so at this point I've create an afform for listing foos, and a tab in the contact record, but have no way of creating them. That's kind of logical because I don't have a database table for storing foos. So that begs the question, when would you ever want to create an packaged search without afform entities? If you were using custom data would be one reason I guess...

https://docs.civicrm.org/dev/en/latest/afform/form-builder/ - this is how to make an afform entity (or make your entity an afform entity). It's a manual process - add mixin to info.xml, then put php file in afformEntities folder

So in my process chart, I think a key questions is, how do you want to store your new thing - create an entity, or use custom data? What are the pros and cons? Seems to me the only reason to use custom data is you can do it through the UI...

Tried `civix export Afform formname` for jobads and that works, but why am I not seeing the contact field as an option in the form builder UI, whereas it is in API4? Answer: needed to run `civix generate:entity-boilerplate` 

NB there is a php error in /Civi/APi4/JobAd.php

Now, how do I get an 'add job ad' link to appear in a contact tab? And/or how to get an 'add' button to appear in the job ad listing? Come to that, how do I get a listing of jobads to appear in the contact jobads tab? I just cloned and installed 'pets' and I'm not seeing it there...

This should be decided by the Expose To setting in the form builder UI - ? but that is already set for Pets - Expose To: Contact Summary Tab - but not working...

I think that just adds a tab to the contact summary, but to have something actually in the tab, you have to follow this: https://docs.civicrm.org/dev/en/latest/step-by-step/create-entity/#10-add-a-tab-on-contact-summary

```

```

...or do you... I went down that road, and by the bye found that I didn't have the table display that form builder relied on in the mgd.php file (and hence the form didn't work when I re-installed the extension), so I rectified that and then found that the tab on contact summary works (but only when that is specificed in 'exposed to' in the FB UI), and *still* works if I comment out everything in the files added by `civix generate:page ContactTab civicrm/myentity/contacttab` 

ok, I had to update this bit of code in /jobads.php:

```php
    $tabs[] = array(
      'id' => 'contact_jobads',
      'url' => $url,
      'count' => $myEntities->count(),
      'title' => E::ts('Job Ads'),
      'weight' => 150,
      'icon' => 'crm-i fa-envelope-open',
    );
```

...i.e. the hook that adds a new tab (or tabs), and now the tab is created by the extension rather than the FB UI. But what of the page and template defined in CRM/Page/ContactTab.php and templates/CRM/Myentity/Page/ContactTab.tpl?

We just don't seem to be getting to those pages. I can put any old crap in there and no error is raised. But I do have a working job ads tab in the contact summary... and in the FB UI, the job ad submission and search forms are both shown as coming from the jobads 'package'.

Now here's an interesting thing. The Pets extension adds a tab, but the tab doesn't do what it should - no pets are listed even though I added one for contact. Why is this? Because there's no display in the SK?

[returning to the 'add' question, this is done in Pets by adding to the SK display via toolbar then re-exporting to mgd]

So I add:

```php
          'toolbar' => [
            [
              'path' => 'civicrm/jobad/add',
              'icon' => 'fa-external-link',
              'text' => E::ts('Link'),
              'style' => 'default',
              'condition' => [],
              'task' => '',
              'entity' => '',
              'action' => '',
              'join' => '',
              'target' => '',
            ],
```

...to the mgd file, and that adds an 'add' button, but if I add \#?contact_id=[contact_id] to the end of the add link (following the example of Pets), it just doesn't work i.e. the link doesn't appear. How do I add an 'add' button that is for the current contact?

Note, you can change the text and style of the add button (styles from the options as per the SK UI - default, success, etc). How would you change the positon? Would that level of change require an ang page and template? (which is one of the things I haven't got working and nee to ask K about)



I added Contact to job ad submission form, through UI - but how are forms packaged in extension??



Making changes appear - sometime you need to recreate entity boilerplate, sometimes you just need to cv flush - depends on type of change AND ALSO if there are any local changes to SK!



Questions for Kurund:

- why doesn't the 'add' button work when I change the path to civicrm/jobad/add\#?contact_id=[contact_id]

you add 'add' and 'update' paths to xml schema, then these become available in SK UI

- how can I change the position of the Add button? [have it rendered in some way other than in a toolbar]

this would have to be done via creation of an angular module

- generally, how to style displays, or make bespoke displays I guess...

angular again (https://lab.civicrm.org/ayduns/calendarskdisplay)

- why doesn't the adding of a contact summary tab work in the way described in the manual? If I wanted it to work in that way - to have a bespoke template (which is maybe the way to change the position of the add button), how would I do that?

beacuse SK does all this now

- how do you make a submission form part of your extension? [it's confusing how SK and FB have a fundamentally different UI approach i.e. the former is Custom/Packaged, the latter is Submission/Search]
- talk me through how to make fk to options
- [could be that some of this will only really make sense if I understand how angular works...]
- what's the request-response cycle in Civi?
- how to specify the action following submission of new job ad form? and make it context sensitive? - I see an option in the FB UI, but seems limited

if you want to make it context sensitive, not available via UI so use afform submit event https://docs.civicrm.org/dev/en/latest/afform/afform-events/#civiafformsubmit

- what's 'existing job ad' in submission form UI?
- how to preserve existing data when uninstall/installing

https://docs.civicrm.org/dev/en/latest/extensions/civix/#generate-upgrader





How far am I off having the needed functionality?

- have a job ads entity
- have fk links to option groups, for job type for e.g.
- be able to CRUD job ads on the admin side
- allow external user to add job ad, 
- ...and pay online (how would *that* work?)
- send notifications
- allow external user to view current/past ads
- have a publicly available job ad listing
- 



Just noticed that list of job ads under contact tab is all job ads, not just those for current contact... how do I fix this - I have absolutely no fucking clue...

how is the contact summary page constructed? How do other tabs get the correct count of related records?

the answer is here: https://chat.civicrm.org/civicrm/pl/fkkb51mxttfopxe186cokaokzo

so a pattern is emerging - make change in UI, export, make change in UI, export... and so on



current issue: got the add/edit to be for tabbed user, and got them in popups, but now have problem with the general search for all jobs - losing path, and losing add button

perhaps I just need two displays, or forms at least, one for contact tab, one showing all, for admin - I mean I will want a separate form, whatever, because it's going to need filters at top

aha! - looking in the UI list of fomrs, forms that are on contact tab never have anything in the 'page' column



Ok, this is all working pretty nicely - have all CRUD except Delete for admin and for contact tab

How to implement delete?

So, to do:

- delete ad
- restrict to organisations only
- add more fields
- public listing
- public form for submitting new job ad
- online payment



A new set of questions for Kurund:

- how to add delete path

note the path with 'form' didn't exist...

- error reporting - how to do?
- how to make a contribution page

use form builder, on submission direct to contribution page - pass in amount via url of contribution page (and job id, to attach the payment to job ad - this might need a new entity to link contribution page to job advert) 

- problem with ECK





hide contact in tab add form



OK so Kurund talked me through creating a delete form and path, whcih was helpful in terms of learning how civi code works, but I just recreated a foo extension, and find I have a working delete link by some kind of magic!? How has this happened?

