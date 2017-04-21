# Maintenance Mode plugin for Craft CMS 3.x

Programmatically disable the website through command line. Use this for your automated build processes to disable the website during build!

## Installation

To install Maintenance Mode, follow these steps:

1. Download & unzip the file and place the `maintenancemode` directory into your `craft/plugins` directory
2.  -OR- do a `git clone https://github.com/venveo/maintenance-mode.git` directly into your `craft/plugins` folder.  You can then update it with `git pull`
4. Install plugin in the Craft Control Panel under Settings > Plugins
5. The plugin folder should be named `maintenancemode` for Craft to see it.  GitHub recently started appending `-master` (the branch name) to the name of the folder for zip file downloads.

Maintenance Mode works on Craft 3.x.

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
