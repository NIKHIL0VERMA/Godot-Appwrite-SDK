<?php

declare(strict_types=1);

namespace Tests\E2E;

use Appwrite\SDK\Language\GDScript;
use Override;
final class GDScript4Test extends Base
{
    #[Override]
    protected string $sdkName = 'gdscript';
    #[Override]
    protected string $sdkPlatform = 'server';
    #[Override]
    protected string $sdkLanguage = 'gdscript';
    #[Override]
    protected string $version = '0.0.1';

    #[Override]
    protected string $language = 'gdscript';
    #[Override]
    protected string $class = GDScript::class;
    #[Override]
    protected array $build = [
        'cp tests/e2e/languages/gdscript/test.gd tests/e2e/sdks/gdscript/test.gd',
        'cp -r tests/resources tests/e2e/sdks/gdscript/tests/',
        'docker run --rm \
        -v $(pwd)/tests/e2e/sdks/gdscript:/app \
        -w /app \
        barichello/godot-ci:4.6 \
        godot --headless --import --quit'
    ];
    #[Override]
    protected string $command =
        'docker run --network="mockapi" --rm \
        -v $(pwd)/tests/e2e/sdks/gdscript:/app \
        -w /app \
        barichello/godot-ci:4.6 \
        godot --headless --script test.gd';

    #[Override]
    protected array $expectedOutput = [
        ...Base::PING_RESPONSE,
        ...Base::FOO_RESPONSES,
        ...Base::BAR_RESPONSES,
        ...Base::GENERAL_RESPONSES,
        ...Base::UPLOAD_RESPONSES,
        ...Base::ENUM_RESPONSES,
        ...Base::MODEL_RESPONSES,
        ...Base::EXCEPTION_RESPONSES,
        ...Base::OAUTH_RESPONSES,
        ...Base::QUERY_HELPER_RESPONSES,
        ...Base::PERMISSION_HELPER_RESPONSES,
        ...Base::ID_HELPER_RESPONSES,
        ...Base::OPERATOR_HELPER_RESPONSES
    ];
}
