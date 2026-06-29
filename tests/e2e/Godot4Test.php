<?php

declare(strict_types=1);

namespace Tests\E2E;

use Appwrite\SDK\Language\Godot;
use Override;

final class Godot4Test extends Base
{
    #[Override]
    protected string $sdkName = 'godot';
    #[Override]
    protected string $sdkPlatform = 'client';
    #[Override]
    protected string $sdkLanguage = 'godot';
    #[Override]
    protected string $version = '0.0.1';

    #[Override]
    protected string $language = 'godot';
    #[Override]
    protected string $class = Godot::class;

    #[Override]
    protected array $build = [
        'cp tests/e2e/languages/godot/test.gd tests/e2e/sdks/godot/tests/test.gd',
        'cp -r tests/resources tests/e2e/sdks/godot/tests/',
        'docker run --rm \
        -v $(pwd)/tests/e2e/sdks/godot:/app \
        -w /app \
        barichello/godot-ci:4.6 \
        godot --headless --import --quit'
    ];

    #[Override]
    protected string $command =
        'docker run --network="mockapi" --rm \
        -v $(pwd)/tests/e2e/sdks/godot:/app \
        -w /app \
        barichello/godot-ci:4.6 \
        godot --headless --script tests/test.gd';

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
        ...Base::QUERY_HELPER_RESPONSES,
        ...Base::PERMISSION_HELPER_RESPONSES,
        ...Base::ID_HELPER_RESPONSES,
        ...Base::OPERATOR_HELPER_RESPONSES
    ];
}
