

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

...this could be working, but we need to add some 'foos' first, so we need to make an 'add' form (foos are not in api4)

Note that whereas in the SK UI there is a tab for your own (custom) SKs and one for packaged, the FB UI doesn't work in an analogous way - you have tabs for submission forms and search forms (and field blocks and system forms), but these are a mixture of ones defined in extensions and ones created locally. That's a bit confusing until you get used to it.

As things stand, foos are not showing as something that can have a submission form, whereas job ads are - so what's the reason for this again... foos are not an API4 entity - they don't appear there either, so at this point I've create an afform for listing foos, and a tab in the contact record, but have no way of creating them. That's kind of logical because I don't have a database table for storing foos. So that begs the question, when would you ever want to create an packaged search without afform entities? If you were using custom data would be one reason I guess...

So in my process chart, I think a key questions is, how do you want to store your new thing - create an entity, or use custom data? What are the pros and cons? Seems to me the only reason to use custom data is you can do it through the UI...

Tried `civix export Afform formname` for jobads and that works, but why am I not seeing the contact field as an option in the form builder UI, whereas it is in API4? Answer: needed to run `civix generate:entity-boilerplate` 

NB there is a php error in /Civi/APi4/JobAd.php

Now, how do I get an 'add job ad' link to appear in the contact summary tab? And/or how to get an 'add' button to appear in the job ad listing? Come to that, how do I get a listing of jobads to appear in the contact jobads tab? I just cloned and installed 'pets' and I'm not seeing it there...

This should be decided by the Expose To setting in the form builder UI - but that is already set for Pets - Expose To: Contact Summary Tab - but not working...