<?php

namespace Appwrite\SDK\Language;

use Override;
use Appwrite\SDK\Language;
use Twig\TwigFilter;

class GDScript extends Language
{
    public function getName(): string
    {
        return 'GDScript';
    }

    /**
     * Get Language Keywords List
     */
    public function getKeywords(): array
    {
        return [
            'if',
            'elif',
            'else',
            'for',
            'while',
            'match',
            'when',
            'break',
            'continue',
            'pass',
            'return',
            'class',
            'class_name',
            'extends',
            'is',
            'as',
            'in',
            'self',
            'super',
            'signal',
            'func',
            'static',
            'const',
            'enum',
            'var',
            'breakpoint',
            'preload',
            'await',
            'assert',
            'void',
            'PI',
            'TAU',
            'INF',
            'NAN',
            'and',
            'or',
            'not',
            '@export',
            '@onready',
            '@tool',
            '_ready',
            'name',
            'type',
            '_process',
            '_physics_process',
            '_input',
            '_unhandled_input',
            '_exit_tree',
            'get',
            'set',
            'Theme',
            'Button',
            'LineEdit',
            'TextureRect',
            'Label',
            'Control',
            'print',
            'prints',
            'printerr',
            'push_error',
            'push_warning',
            'len',
            'range',
            'load',
            'type_exists',
            'is_instance_valid',
            'randf',
            'randi',
            'randomize',
            'clamp',
            'lerp',
            'free',
            'call',
            'callv',
            'call_deferred',
            '@export_range',
            'connect',
            'disconnect',
            'emit_signal',
            'has_method',
            'has_signal',
            'get_meta',
            'set_meta',
            'has_meta',
            'to_string',
            'is_inside_tree',
            '_enter_tree',
            '_unhandled_key_input',
            '_notification',
            'add_child',
            'remove_child',
            'get_node',
            'get_parent',
            'queue_free',
            'duplicate',
            'get_tree',
            'Object',
            'RefCounted',
            'Node',
            'Node2D',
            'Node3D',
            'Callable',
            'Vector2',
            'Vector3',
            'Vector4',
            'Color',
            'Transform2D',
            'Transform3D',
            'RID',
            '@on_ready',
            'namespace'
            // TODO: add more
        ];
    }

    public function getIdentifierOverrides(): array
    {
        return [];
    }

    public function getStaticAccessOperator(): string
    {
        return '.';
    }

    public function getStringQuote(): string
    {
        return '"';
    }

    public function getArrayOf(string $elements): string
    {
        return '[' . $elements . ']';
    }

    public function getFiles(): array
    {
        return [
            [
                'scope' => 'default',
                'destination' => 'LICENSE',
                'template' => 'gdscript/LICENSE.twig',
            ],
            [
                'scope' => 'default',
                'destination' => 'README.md',
                'template' => 'gdscript/README.md.twig',
            ],
            [
                'scope' => 'default',
                'destination' => 'addons/{{ spec.title | caseSnake }}/plugin.cfg',
                'template' => 'gdscript/addons/plugin.cfg.twig',
            ],
            [
                'scope' => 'default',
                'destination' => 'addons/{{ spec.title | caseSnake }}/plugin.gd',
                'template' => 'gdscript/addons/plugin.gd.twig',
            ],
            [
                'scope' => 'default',
                'destination' => 'addons/{{ spec.title | caseSnake }}/{{ spec.title | caseSnake }}.gd',
                'template' => 'gdscript/addons/appwrite.gd.twig',
            ],
            [
                'scope' => 'default',
                'destination' => 'addons/{{ spec.title | caseSnake }}/icon.svg',
                'template' => 'gdscript/addons/icon.svg',
            ],
            [
                'scope' => 'copy',
                'destination' => '.gitignore',
                'template' => 'gdscript/.gitignore',
            ],
            [
                'scope' => 'copy',
                'destination' => '.gitattributes',
                'template' => 'gdscript/.gitattributes',
            ],
            [
                'scope' => 'default',
                'destination' => 'addons/{{ spec.title | caseSnake }}/utils/client.gd',
                'template' => 'gdscript/addons/utils/client.gd.twig',
            ],
            [
                'scope' => 'default',
                'destination' => 'addons/{{ spec.title | caseSnake }}/utils/service.gd',
                'template' => 'gdscript/addons/utils/service.gd.twig',
            ],
            [
                'scope' => 'default',
                'destination' => 'addons/{{ spec.title | caseSnake }}/utils/exception.gd',
                'template' => 'gdscript/addons/utils/exception.gd.twig',
            ],
            [
                'scope' => 'default',
                'destination' => 'addons/{{ spec.title | caseSnake }}/utils/id.gd',
                'template' => 'gdscript/addons/utils/id.gd.twig',
            ],
            [
                'scope' => 'default',
                'destination' => 'addons/{{ spec.title | caseSnake }}/utils/permission.gd',
                'template' => 'gdscript/addons/utils/permission.gd.twig',
            ],
            [
                'scope' => 'default',
                'destination' => 'addons/{{ spec.title | caseSnake }}/utils/role.gd',
                'template' => 'gdscript/addons/utils/role.gd.twig',
            ],
            [
                'scope' => 'default',
                'destination' => 'addons/{{ spec.title | caseSnake }}/utils/query.gd',
                'template' => 'gdscript/addons/utils/query.gd.twig',
            ],
            [
                'scope' => 'default',
                'destination' => 'addons/{{ spec.title | caseSnake }}/utils/input_file.gd',
                'template' => 'gdscript/addons/utils/input_file.gd.twig',
            ],
            [
                'scope' => 'default',
                'destination' => 'addons/{{spec.title | caseSnake}}/utils/operator.gd',
                'template' => 'gdscript/addons/utils/operator.gd.twig',
            ],
            [
                'scope' => 'default',
                'destination' => '.env.example',
                'template' => 'gdscript/.env.twig',
            ],
            [
                'scope' => 'default',
                'destination' => 'project.godot',
                'template' => 'gdscript/project.godot.twig',
            ],
            [
                'scope' => 'default',
                'destination' => 'tests/test_query.gd',
                'template' => 'gdscript/addons/tests/test_query.gd.twig',
            ],
            [
                'scope' => 'default',
                'destination' => 'tests/test_roles.gd',
                'template' => 'gdscript/addons/tests/test_roles.gd.twig',
            ],
            [
                'scope' => 'default',
                'destination' => 'tests/test_id.gd',
                'template' => 'gdscript/addons/tests/test_id.gd.twig',
            ],
            [
                'scope' => 'default',
                'destination' => 'tests/test_permission.gd',
                'template' => 'gdscript/addons/tests/test_permission.gd.twig',
            ],
            [
                'scope' => 'default',
                'destination' => 'tests/test_input_files.gd',
                'template' => 'gdscript/addons/tests/test_input_files.gd.twig',
            ],
            [
                'scope' => 'default',
                'destination' => 'tests/test_operator.gd',
                'template' => 'gdscript/addons/tests/test_operator.gd.twig',
            ],
            [
                'scope' => 'enum',
                'destination' => 'addons/{{ spec.title | caseSnake }}/enums/{{ enum.name | caseSnake }}.gd',
                'template' => 'gdscript/addons/enums/enum.gd.twig',
            ],
            [
                'scope' => 'service',
                'destination' => 'addons/{{ spec.title | caseSnake }}/services/{{ service.name | caseSnake }}.gd',
                'template' => 'gdscript/addons/services/service.gd.twig',
            ],
            [
                'scope' => 'definition',
                'destination' => 'addons/{{ spec.title | caseSnake }}/models/{{ definition.name | caseSnake }}.gd',
                'template' => 'gdscript/addons/models/model.gd.twig',
            ],
            [
                'scope' => 'requestModel',
                'destination' => 'addons/{{ spec.title | caseSnake }}/models/{{ requestModel.name | caseSnake }}.gd',
                'template' => 'gdscript/addons/models/model.gd.twig',
            ],
            [
                'scope' => 'method',
                'destination' => 'docs/{{service.name | caseSnake}}/{{method.name | caseSnake}}.md',
                'template' => 'gdscript/docs/example.md.twig',
            ],
            [
                'scope' => 'copy',
                'destination' => 'docs/.gdignore',
                'template' => 'gdscript/.gdignore',
            ],
            [
                'scope' => 'copy',
                'destination' => 'tests/.gdignore',
                'template' => 'gdscript/.gdignore',
            ],
            [
                'scope' => 'copy',
                'destination' => 'docs/overrides/assets/img/favicon.ico',
                'template' => 'gdscript/docs/overrides/assets/img/favicon.ico',
            ],
            [
                'scope' => 'copy',
                'destination' => 'docs/overrides/assets/img/icon.svg',
                'template' => 'gdscript/addons/icon.svg',
            ],
            [
                'scope' => 'copy',
                'destination' => 'docs/overrides/assets/js/gdscript.min.js',
                'template' => 'gdscript/docs/overrides/assets/js/gdscript.min.js'
            ],
            [
                'scope' => 'copy',
                'destination' => 'docs/overrides/modules/footer.html',
                'template' => 'gdscript/docs/overrides/modules/footer.html',
            ],
            [
                'scope' => 'copy',
                'destination' => 'docs/index.md',
                'template' => 'gdscript/docs/index.md',
            ],
            [
                'scope' => 'copy',
                'destination' => 'docs/getting_started.md',
                'template' => 'gdscript/docs/getting_started.md',
            ],
            [
                'scope' => 'default',
                'destination' => 'docs/configuration.md',
                'template' => 'gdscript/docs/configuration.md.twig',
            ],
            [
                'scope' => 'default',
                'destination' => 'mkdocs.yml',
                'template' => 'gdscript/mkdocs.yml.twig',
            ],
            [
                'scope' => 'copy',
                'destination' => 'docs/.nav.yml',
                'template' => 'gdscript/docs/.nav.yml',
            ],
            [
                'scope' => 'copy',
                'destination' => '.github/workflows/ci.yml',
                'template' => 'gdscript/.github/workflows/ci.yml',
            ],
        ];
    }

    public function getTypeName(array $parameter, array $spec = []): string
    {
        $prefix = $this->toPascalCase($spec['title'] ?? '');

        // ARRAY TYPES
        if (($parameter['type'] ?? null) === self::TYPE_ARRAY) {
            // Array of models
            if (!empty($parameter['array']['model'])) {
                return 'Array[' . $prefix . $this->toPascalCase($parameter['array']['model']) . ']';
            }

            // Array of enums
            if (isset($parameter['enumName'])) {
                return 'Array[String]';
            }

            if (!empty($parameter['enumValues'])) {
                return 'Array[String]';
            }

            return 'Array';
        }

        // MODEL TYPE
        if (!empty($parameter['model'])) {
            return $prefix . $this->toPascalCase($parameter['model']);
        }

        // ENUM TYPE
        if (isset($parameter['enumName'])) {
            return 'String';
        }

        if (!empty($parameter['enumValues'])) {
            return 'String';
        }

        // PRIMITIVES
        return match ($parameter['type'] ?? '') {
            self::TYPE_INTEGER => 'int',
            self::TYPE_NUMBER => 'float',
            self::TYPE_STRING => 'String',
            self::TYPE_BOOLEAN => 'bool',
            self::TYPE_ARRAY => 'Array',
            self::TYPE_OBJECT => 'Dictionary',
            self::TYPE_FILE => $prefix . 'InputFile',
            default => 'Variant',
        };
    }

    public function getParamDefault(array $param): string
    {
        $type = $param['type'] ?? '';
        $default = $param['default'] ?? '';
        $required = $param['required'] ?? '';

        if ($required) {
            return '';
        }

        $output = ' = ';

        if (empty($default) && $default !== 0 && $default !== false) {
            match ($type) {
                self::TYPE_NUMBER => $output .= '0.0',
                self::TYPE_INTEGER => $output .= '0',
                self::TYPE_BOOLEAN => $output .= 'false',
                self::TYPE_STRING => $output .= "''",
                self::TYPE_ARRAY => $output .= '[]',
                self::TYPE_OBJECT => $output .= '{}',
                default => $output .= 'null',
            };
        } else {
            switch ($type) {
                case self::TYPE_NUMBER:
                    if (is_array($default) || $default === '[]') {
                        $default = '0.0';
                    }
                    $output .= $default;
                    break;
                case self::TYPE_INTEGER:
                    if (is_array($default) || $default === '[]') {
                        $default = '0';
                    }
                    $output .= $default;
                    break;
                case self::TYPE_ARRAY:
                case self::TYPE_OBJECT:
                    $output .= $default;
                    break;
                case self::TYPE_BOOLEAN:
                    $output .= ($default) ? 'true' : 'false';
                    break;
                case self::TYPE_STRING:
                    $output .= "'{$default}'";
                    break;
                default:
                    $output .= 'null';
                    break;
            }
        }

        return $output;
    }
    public function getParamExample(array $param, string $lang = '', array $spec = []): string
    {
        $type = $param['type'] ?? '';
        $example = $param['example'] ?? '';
        $prefix = $this->toPascalCase($spec['title'] ?? '');

        $output = '';

        if (empty($example) && $example !== 0 && $example !== false) {
            switch ($type) {
                case self::TYPE_NUMBER:
                    $output .= '0.0';
                    break;
                case self::TYPE_INTEGER:
                    $output .= '0';
                    break;
                case self::TYPE_BOOLEAN:
                    $output .= 'false';
                    break;
                case self::TYPE_STRING:
                    $output .= '""';
                    break;
                case self::TYPE_ARRAY:
                    $output .= '[]';
                    break;
                case self::TYPE_OBJECT:
                    $output .= '{}';
                    break;
                case self::TYPE_FILE:
                    $output .= $prefix . 'InputFile.from_path("file.png")';
                    break;
            }
        } else {
            switch ($type) {
                case self::TYPE_NUMBER:
                case self::TYPE_INTEGER:
                case self::TYPE_ARRAY:
                case self::TYPE_OBJECT:
                    $output .= $example;
                    break;
                case self::TYPE_BOOLEAN:
                    $output .= ($example) ? 'true' : 'false';
                    break;
                case self::TYPE_STRING:
                    $output .= "'{$example}'";
                    break;
                case self::TYPE_FILE:
                    $output .= $prefix . 'InputFile.from_path("file.png")';
                    break;
            }
        }

        return $output;
    }

    #[Override]
    public function getFilters(): array
    {
        return array_merge([
            new TwigFilter('caseEnumKey', fn(string $value): string => $this->toUpperSnakeCase($value)),
            new TwigFilter('uniqueSnake', fn(string $value): string => $this->toUniqueSnake($value)),
            new TwigFilter('enumExample', function (array $param): string {
                $enumValues = $param['enumValues'] ?? [];
                if (empty($enumValues)) {
                    return '';
                }

                $enumKeys = $param['enumKeys'] ?? [];
                $enumName = $this->toPascalCase($param['enumName'] ?? $param['name'] ?? '');
                $example = $param['example'] ?? null;
                $isArray = ($param['type'] ?? '') === self::TYPE_ARRAY;

                $resolveKey = function ($value) use ($enumValues, $enumKeys): string {
                    $index = array_search($value, $enumValues, true);
                    if ($index !== false && isset($enumKeys[$index]) && $enumKeys[$index] !== '') {
                        return $this->toUpperSnakeCase($enumKeys[$index]);
                    }
                    if ($index !== false && isset($enumValues[$index])) {
                        return $this->toUpperSnakeCase($enumValues[$index]);
                    }
                    $fallback = $enumKeys[0] ?? $enumValues[0] ?? $value;
                    return $this->toUpperSnakeCase((string) $fallback);
                };

                if ($isArray) {
                    $values = [];
                    if (\is_string($example) && $example !== '') {
                        $decoded = json_decode($example, true);
                        if (\is_array($decoded)) {
                            $values = $decoded;
                        }
                    } elseif (\is_array($example)) {
                        $values = $example;
                    }

                    if ($values === []) {
                        $values = [$enumValues[0]];
                    }

                    $items = array_map(fn($value): string => $enumName . '.' . $resolveKey($value), $values);

                    return '[' . implode(', ', $items) . ']';
                }

                $value = ($example !== null && $example !== '') ? $example : $enumValues[0];
                return $enumName . '.' . $resolveKey($value);
            }),
        ], parent::getFilters());
    }

    private function toUniqueSnake(string $value): string
    {
        $base = $this->toSnakeCase($value);
        return $this->escapeKeyword($base);
    }
}
