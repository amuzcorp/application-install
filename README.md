# application-install Theme for Amuz CMS-UP

- CMS-UP 버전에서 사용가능한 amuz/application-install 테마입니다.

## Install
- 다음 명령을 통해, 컴포저에 리포지터리를 등록하고, 컴포저를 통해 패키지가 자동설치될 수 있도록 할 수 있습니다.
- 먼저 저장소를 추가 합니다.

```shell
composer config repositories.amuz/application-install vcs https://github.com/amuzcorp/application-install
```

### for production

- 테마의 개발상태에 따라 :dev-main 태그는 제거하고 지정된 버전으로 변경할 수도 있습니다.
```shell
composer require amuz/application-install:dev-main
```

### for development

- 테마를 개발중인 경우, 저장소를 직접 `clone` 한 것처럼, 패키지를 소스설치하는것이 더 유용할 수 있습니다.
- 테마를 `require` 하기전에 다음과같이 해당패키지의 `--prefer-source` 옵션이 적용되도록 `root` `composer.json` 의 `config` 를 수정해야합니다.

```json
"config": {
    "preferred-install": {
        "amuz/application-install": "source"
    }
}
```

- 이렇게하면, 해당 패키지가 `git` 을통해 `clone` 된 것 처럼 작동합니다.
- 이제 `require` 를 통해 설치하고, `composer install` 또는 `composer update` 등을 진행해도 저장소와 계속 연결이 유지되고, 변경점을 `push`할 수 있게 됩니다.

```shell
composer require amuz/application-install:dev-main
```

## Migration & Config

필요한경우, 설정파일 및 마이그레이션 파일을 프로젝트 루트로 게시하여 활용할 수 있습니다. 다음 태그를이용해 적절히 게시하면 됩니다.

```shell
php artisan vendor:publish --tag=application-install-config
php artisan vendor:publish --tag=application-install-migrations
```

## Seed
- 앱 릴리즈 모델이 어떻게 작성되고, 테마에 어떻게 반영되는지 확인하려면 아래 명령을 통해 릴리즈모델만 시드할 수 있습니다.
- 이 작업을 위해 별도의 Model Factory 가 제공됩니다.

```shell
php artisan db:seed --class="AmuzThemes\ApplicationInstall\Database\Seeders\\AppReleaseSeeder"
```
