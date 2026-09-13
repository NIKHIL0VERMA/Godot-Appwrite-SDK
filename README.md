# ⚙️ Appwrite SDK Generator for Godot 

> [!NOTE]
> This repository is a community-maintained fork of Appwrite's SDK Generator.
> 
> Upstream project: https://github.com/appwrite/sdk-generator
>
> It adds support for:
> - Godot 4.x Client SDK generation
> - GDScript Server SDK generation
>
> The original SDK Generator architecture, specifications, and language implementations are maintained by the Appwrite project and its contributors.

## Godot Support

This fork introduces two new generation targets:

| Target | Purpose |
|----------|----------|
| Godot | Client SDK for Godot 4.x games |
| GDScript | SDK for headless Godot server and multiplayer applications |

Generated SDKs support:

- Authentication
- Databases
- Storage
- Realtime
- Functions
- Teams
- Messaging
- Avatars

and other Appwrite services exposed through the OpenAPI specification.

## Project Status

This project is community-maintained.

The Godot and GDScript generators are developed independently from the Appwrite core SDK roadmap.

This fork tracks upstream Appwrite SDK Generator changes when possible while focusing on Godot ecosystem support.

## Repository Purpose

This repository exists to maintain and evolve Appwrite SDK support for the Godot ecosystem.

Primary goals:

- Generate Godot 4.x client SDKs
- Generate GDScript server/headless SDKs
- Publish ready-to-use SDK releases
- Support Godot Asset Library distribution
- Track Appwrite API updates
[Utopia OpenAPI](https://github.com/utopia-php/openapi) parses OpenAPI 2.0, 3.0, and 3.1 documents into one canonical model. The generator consumes that model to render services, methods, models, enums, and union types.

## Getting Started

Install using composer:

**CLI**
```bash
composer update --ignore-platform-reqs --optimize-autoloader
```

**Docker (UNIX)**

```bash
docker run --rm --interactive --tty --volume "$(pwd)":/app composer install --ignore-platform-reqs
```

**Docker (Windows)**

```bash
docker run --rm --interactive --tty --volume "%cd%":/app composer install --ignore-platform-reqs
```

Create language and SDK instances and generate code to target directory.

```php
<?php

require_once 'vendor/autoload.php';

use Appwrite\SDK\SDK;
use Appwrite\SDK\Language\PHP;
use Utopia\OpenAPI\Parser;

// Parse an OpenAPI 2, 3.0, or 3.1 document into the canonical specification model.
// One document covers every SDK platform; the SDK selects its own below.
$version = '2.0.x';
$platform = 'server';
$content = file_get_contents("https://raw.githubusercontent.com/appwrite/specs/main/specs/{$version}/open-api3-{$version}.json");
$spec = Parser::parse($content);

// Create language instance
$lang = new PHP();

$lang // Set language or platform specific options
    ->setComposerPackage('my-api')
    ->setComposerVendor('my-company')
;

// Create the SDK object with the language and spec instances
$sdk  = new SDK($lang, $spec);

$sdk
    ->setPlatform($platform) // Keep the operations, aliases and security schemes available to this platform
    ->setCoverImage('https://github.com/appwrite/appwrite/raw/main/public/images/github.png')
    ->setLicenseContent('License content here.')
    ->setVersion('v1.1.0')
;

$sdk->generate(__DIR__ . '/examples/php'); // Generate source code

```

For generated artifacts that do not need API operations, create a minimal canonical specification:

```php
<?php

require_once 'vendor/autoload.php';

use Appwrite\SDK\SDK;
use Appwrite\SDK\Language\Skills;
use Utopia\OpenAPI\Parser;

$spec = Parser::parse([
    'openapi' => '3.0.0',
    'info' => [
        'title' => 'Appwrite',
        'description' => 'Appwrite backend as a service',
        'version' => '2.0.x',
        'license' => [
            'name' => 'BSD-3-Clause',
            'url' => 'https://raw.githubusercontent.com/appwrite/appwrite/master/LICENSE',
        ],
    ],
    'paths' => [],
]);

$sdk = new SDK(new Skills(), $spec);

$sdk
    ->setName('Appwrite')
    ->setVersion('2.0.x')
;

$sdk->generate(__DIR__ . '/examples/skills');
```

## Linting Twig Templates

This project uses [djLint](https://djlint.com/) to lint Twig template files for syntax and common issues.

**Note:** Formatting is disabled as it breaks code generation syntax. Only linting is used.

**Available command:**
```bash
composer lint-twig  # Check for linting errors
```

Requires [uv](https://github.com/astral-sh/uv) to be installed. Configuration is in `pyproject.toml`. The linter runs automatically on pull requests via GitHub Actions.

## Supported Specs

* [OpenAPI 3.1](https://github.com/OAI/OpenAPI-Specification/blob/main/versions/3.1.0.md)
* [OpenAPI 3.0](https://github.com/OAI/OpenAPI-Specification/blob/main/versions/3.0.4.md)
* [OpenAPI (Swagger) 2](https://github.com/OAI/OpenAPI-Specification/blob/main/versions/2.0.md)
* [RAML 1.0](https://raml.org/) (Not Ready)
* [RAML 0.8](https://raml.org/) (Not Ready)
* [Postman 2.0](https://schema.getpostman.com/json/collection/v2.0.0/docs/index.html) (Not Ready)
* [Postman 1.0](https://schema.getpostman.com/json/collection/v1.0.0/docs/index.html) (Not Ready)
* [API Blueprint 1A](https://github.com/apiaryio/api-blueprint/blob/master/API%20Blueprint%20Specification.md) (Not Ready)

### Naming enum values

Enum wire values are converted into identifiers for each generated language. To give values explicit semantic names, describe the enum as titled `oneOf` branches. This is especially useful when values contain non-Latin text:

```yaml
title: ProvinceType
type: string
oneOf:
  - title: Capital
    enum: [រាជធានី]
  - title: Province
    enum: [ខេត្ត]
```

OpenAPI 3.1 specifications can use `const` instead of a single-value `enum`. When a value has no explicit title and cannot form a valid identifier, the generator uses a deterministic positional name such as `Value1`.

## Generated SDKs and Artifacts

The primary generation targets are defined in `example.php`. Run it without arguments to generate every target with the default `console` platform spec, or pass a target and optional platform to generate one SDK:

```bash
php example.php
php example.php <target>
php example.php <target> <platform>
php example.php <target> <platform> <format>
```

`<platform>` can be `console`, `client`, or `server`. If omitted, it defaults to `console`.

`<format>` can be `openapi3` or `swagger2`. If omitted, it defaults to `openapi3`. Remote OpenAPI 3 generation uses the current `2.0.x` specs; because Swagger 2 documents are not published for `2.0.x`, remote Swagger 2 generation uses the latest available `1.8.x` specs.

Examples:

```bash
php example.php web client
php example.php node server
php example.php cli console
php example.php skills
php example.php zed-extension
```

### Client SDKs

| Target | Argument | Supported Versions | Coding Standards | Package Manager | Output |
|--------|----------|--------------------|------------------|-----------------|--------|
| Web | `web` | ES5+; Node.js >=18 for builds | [NPM Coding Style] | NPM | `examples/web/` |
| Flutter | `flutter` | Dart >=3.7 <4; Flutter >=3.29 | [Effective Dart] | pub | `examples/flutter/` |
| Apple | `apple` | iOS 15+, macOS 11+, watchOS 7+, tvOS 13+ | [Swift Style Guide] | Swift Package Manager | `examples/apple/` |
| Android | `android` | Android 6.0+; Java 17 in CI | [Android style guide] | Gradle, Maven | `examples/android/` |
| React Native | `react-native` | React Native >=0.76.7 <1.0.0; Node.js >=18 | [NPM Coding Style] | NPM | `examples/react-native/` |
| Godot | `godot` | Godot 4.6+ | [GDScript Style Guide] | Native | `examples/godot/` |

### Server SDKs

| Target | Argument | Supported Versions | Coding Standards | Package Manager | Output |
|--------|----------|--------------------|------------------|-----------------|--------|
| Node.js | `node` | Node.js 20 in CI | [NPM Coding Style] | NPM | `examples/node/` |
| PHP | `php` | PHP >=8.2 | [PHP FIG] | Composer | `examples/php/` |
| Python | `python` | Python >=3.9 | [PEP8] | pip | `examples/python/` |
| Ruby | `ruby` | Ruby 3.1 in CI | [Ruby Style Guide] | RubyGems, Bundler | `examples/ruby/` |
| Dart | `dart` | Dart >=2.17 <4 | [Effective Dart] | pub | `examples/dart/` |
| Go | `go` | Go 1.26.5 | [Effective Go] | Go modules | `examples/go/` |
| Swift | `swift` | Swift 5.1+; Swift 5.9.2 in CI | [Swift Style Guide] | Swift Package Manager | `examples/swift/` |
| .NET | `dotnet` | .NET Standard 2.0; .NET Framework 4.6.2 | [C# Coding Conventions] | NuGet | `examples/dotnet/` |
| Kotlin | `kotlin` | JVM 1.8 target; Java 17 in CI | [Kotlin style guide] | Gradle, Maven | `examples/kotlin/` |
| Rust | `rust` | Rust >=1.83 | [Rust API Guidelines] | Cargo | `examples/rust/` |
| GDScript | `gdscript` | Godot 4.6+ | [GDScript Style Guide] | Native | `examples/gdscript/` |

### Tooling and Documentation

| Target | Argument | Supported Versions | Coding Standards | Package Manager | Output |
|--------|----------|--------------------|------------------|-----------------|--------|
| CLI | `cli` | Go 1.26.5 | [Effective Go] | Go modules, native binaries, NPM | `examples/cli/` |
| REST examples | `rest` | N/A | Markdown | N/A | `examples/REST/` |
| GraphQL | `graphql` | N/A | GraphQL | N/A | `examples/graphql/` |
| Skills | `skills` | N/A | Markdown | N/A | `examples/skills/` |
| Cursor Plugin | `cursor-plugin` | N/A | Markdown | N/A | `examples/cursor-plugin/` |
| Claude Plugin | `claude-plugin` | N/A | Markdown | N/A | `examples/claude-plugin/` |
| Codex Plugin | `codex-plugin` | N/A | Markdown | N/A | `examples/codex-plugin/` |
| Zed Extension | `zed-extension` | Zed extension API 0.7.0 | Rust | Cargo | `examples/zed-extension/` |

[PHP FIG]: https://www.php-fig.org/
[NPM Coding Style]: https://docs.npmjs.com/misc/coding-style
[Ruby Style Guide]: https://github.com/rubocop/ruby-style-guide
[PEP8]: https://peps.python.org/pep-0008/
[Effective Dart]: https://dart.dev/effective-dart/style
[Effective Go]: https://go.dev/doc/effective_go
[Swift Style Guide]: https://google.github.io/swift/
[C# Coding Conventions]: https://learn.microsoft.com/en-us/dotnet/csharp/fundamentals/coding-style/coding-conventions
[Kotlin style guide]: https://kotlinlang.org/docs/coding-conventions.html
[Android style guide]: https://developer.android.com/kotlin/style-guide
[Rust API Guidelines]: https://rust-lang.github.io/api-guidelines/
[GDScript Style Guide]: https://docs.godotengine.org/en/stable/tutorials/scripting/gdscript/gdscript_styleguide.html

## Contributing

Pull requests are welcome.

Contributors are encouraged to discuss major architectural or generator changes before implementation.

This repository follows a review-first workflow to maintain compatibility with upstream Appwrite SDK Generator behavior whenever possible.

## Copyright and License

This project is licensed under the MIT License.

This repository is derived from Appwrite SDK Generator and retains the original MIT license and attribution.

Original project:
https://github.com/appwrite/sdk-generator

Godot and GDScript platform support, templates, tests, and related tooling are maintained by Nikhil Verma and community contributors.