Example hooks in Pets extension

In the 'Example hooks' commit, 4 files are changed or created

**pets/Info.xml**

added a new mixin, `scan-classes@1.0.0`

https://github.com/civicrm/civicrm-core/blob/5.63.0/mixin/scan-classes%401/mixin.php

Note from this documentation, scan-classes will look in two places: `in 'CRM_' ('./CRM/**.php') or 'Civi\' ('./Civi/**.php')` so, in any file in any directory under /Civi you can use 'common Civi-PHP interfaces'.

What's an interface again? From my own old notes, and following Zandstra:

> The general rule is you use an abstract class to define what the inheriting classes *are* and you use an interface to create a contract specifying what the implementing class must *do*. By that token, an interface doesn't provide any shared functionality as an abstract class does, but is just a promise/contract about what functionality an implementing class will have. In fact, you could say that an interface *shouldn't* provide actual functionality because the point of it is to say 'this thing must do this' but specifically *not* define how it does it.

There are some rules that follow from this definition of the difference between an abstract class and an interface (which is kind of a contested question), e.g. 'All methods in an interface are abstract'. 

Abstract classes are *extended*, but interfaces are *implemented*.

I think it could be said the word 'interfaces' is wrongly used here in the Civi documentation...

**pets/Civi/Api4/Action/Pet/Feed.php**

(new file)

Declares its own namespace Civi\Api4\Action\Pet, uses some other namespaces:

```php
namespace Civi\Api4\Action\Pet;

use Civi\Api4\Generic\AbstractAction;
use Civi\Api4\Generic\Result;
use Civi\Api4\Pet;
```

All these use statements mean is later on we can do for e.g. `class Feed extends AbstractAction`, instead of `class Feed extends Civi\Api4\Generic\AbstractAction`(we could use an alias if we wanted, as in `use CRM_Pets_ExtensionUtil as E;`)

Now look here: https://docs.civicrm.org/dev/en/latest/api/v4/architecture/#api-action-classes

...this reminds me that the point of this file/class is to define a new Api4 *action*, 'feed'.

So that first `use` is giving us access to the `AbstractAction` class (or trait).

We are defining `$id` as a protected var, hence a parameter of the action being defined, a getter and setter for that var, and a function `_run`, which defines what the action does - in this case, makes 'description' equal to 'fed'. NB 'description' was already defined in the schema, and hence in the database - was that there already? Yes I think so - so Tim just saved a bit of time by using it instead of adding a new field.

**pets/Civi/Api4/Pet.php**

Not a new file, but adds substance to what was originally an empty (but essential) bit of boilerplate. Originally like this:

```php
<?php
namespace Civi\Api4;

/**
 * Pet entity.
 *
 * Provided by the Pets extension.
 *
 * @package Civi\Api4
 */
class Pet extends Generic\DAOEntity {

}
```

...now this:

```php
<?php
namespace Civi\Api4;

use Civi\Api4\Action\Pet\Feed;
use Civi\Api4\Generic\DAOGetAction;

/**
 * Pet entity.
 *
 */
class Pet extends Generic\DAOEntity {

  /**
   * @param bool $checkPermissions
   * @return \Civi\Api4\Action\Pet\Feed
   */
  public static function feed($checkPermissions = TRUE) {
    return (new Feed(static::getEntityName(), __FUNCTION__))
      ->setCheckPermissions($checkPermissions);
  }

}
```

Now we are getting into some deep stuff: https://docs.civicrm.org/dev/en/latest/api/v4/architecture/#dao-actions

What does this (static) function declaration do? I presume this is a declaration of the Api4 action that is defined in the `../Action/Per/Feed.php` class. And presumably the standard action like Get, Create, Update etc. are defined in the Civi\Api4 namespace - what then is Civi\Api4\Generic\DAOGetAction needed for?

**pets/Civi/PetHelper.php**

(new file)

AutoSubscriber? This is part of Symfony I think... 