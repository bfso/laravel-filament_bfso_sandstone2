# Development

## Branches
### Naming convention:

Feature: `feature/#[issue-id]-[branch-name]`

Bugfix: `bugfix/#[issue-id]-[branch-name]`

Hotfix: `hotfix/#[issue-id]-[branch-name]`

Maintenance: `main/#[issue-id]-[branch-name]`

E.g. `feature/#21-add-login-page`

## Commits
### Naming convention:
`[commit-name] #[issue-id]`

E.g. `Add login page #21`
## Start Docker

=> Start Docker Daemon

=> CTRL + SHIFT + P => Rebuild Container
## Laravel Cheatsheet
=> php artisan serve => start server


=> php install => create Autoload

=> php artisan make:migration => php artisan migrate => migrate DB changes / migrate whole DB
=> php artisan make:model => add $fillable variable for insert/read data => return in a function $this->belongsTo(TableUWantDataFrom::class)

## Setting Up Project

1. php install

2. create .env file and copy schematic

3. php artisan serve / start docker for DB
## Filament Forms

1. Create Ressource => php artisan make:filament-ressource --generate name (gross geschrieben)

2. in function form copy schematic (inputs etc.)

3. in function table copy schematics for the view of data created by form from step 2

4. tipp: getPages function is to create, view or edit datas
