# Maintenance Mode plugin for Craft CMS 3.x

Programmatically disable the website through command line. Use this for your automated build processes to disable the website during build!

## Installation

To install Maintenance Mode, follow these steps:

1. Unzip to plugins folder
2. Add plugins/maintenancemode to your composer.json file:
```json
"repositories": [
    {
      "type": "path",
      "url": "./plugins/maintenancemode"
    }
  ]
```
3. Install with composer via symlink: `composer require venveo/maintenance-mode`
Maintenance Mode works on Craft 3 beta 20 and up

## Usage
To enable maintenance mode:
`./craft maintenance-mode/maintenance-mode/enable`

To disable maintenance mode:
`./craft maintenance-mode/maintenance-mode/disable`

## Example Scenario
Using Larvel Forge to deploy your Craft app, you might want to disable the website during the frontend build process:

```bash
cd /home/forge/mysite.com

php craft maintenance-mode/maintenance-mode/enable

git pull origin master --recurse-submodules

git submodule init
git submodule update --remote --recursive

composer install --no-interaction --prefer-dist --optimize-autoloader
echo "" | sudo -S service php7.0-fpm reload

if [ -f artisan ]
then
    php artisan migrate --force
fi

yarn install
npm run production

php craft maintenance-mode/maintenance-mode/disable
```


Brought to you by [Venveo](https://venveo.com)
