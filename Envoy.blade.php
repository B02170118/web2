@servers(['web' => ''])

@setup
    $app_dir = '';
    $dir2 = '';
@endsetup

@story('deploy')
    deploy
    composer
    db
    cache
    rsync
@endstory

@task('deploy')
    echo ----deploy----
    cd {{$app_dir}}
    git checkout .
    git checkout main
    git pull origin main
@endtask

@task('composer')
    echo ----composer----
    cd {{$app_dir}}
    composer install --optimize-autoloader --no-scripts -n -o
@endtask

@task('db')
    echo ----DB Sync----
    cd {{$app_dir}}
    php artisan migrate --force
@endtask

@task('cache')
    echo ----cache----
    cd {{$app_dir}}
    composer dump-autoload
@endtask

@task('rsync')
    echo ----rsync----
    cd {{$dir2}}
    sh rsync.sh
@endtask
