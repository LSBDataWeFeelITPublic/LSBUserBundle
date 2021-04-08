LSBUserBundle
------------------

[![Build Status](https://travis-ci.com/LSBDataWeFeelITPublic/LSBUserBundle.svg?branch=master)](https://travis-ci.com/LSBDataWeFeelITPublic/LSBUserBundle) [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/LSBDataWeFeelITPublic/LSBUserBundle/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/LSBDataWeFeelITPublic/LSBUserBundle/?branch=master) [![Code Coverage](https://scrutinizer-ci.com/g/LSBDataWeFeelITPublic/LSBUserBundle/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/LSBDataWeFeelITPublic/LSBUserBundle/?branch=master)

### Installation

```
composer require lsb/user-bundle
```

### Configuration

```
# config/packages/security.yaml

security:
    providers:
        # the name of your user provider can be anything
        lsb_user_provider:
            id: LSB\UserBundle\Security\UserProvider
            
           
    encoders:
        # use your user class name here
        App\Entity\AppUser:
            # Use native password encoder
            # This value auto-selects the best possible hashing algorithm
            # (i.e. Sodium when available).
            algorithm: auto
            
    firewalls:
        main:
            user_checker: LSB\UserBundle\Security\UserChecker
            # ...
```

### Usage


### License


