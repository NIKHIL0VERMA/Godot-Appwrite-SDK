# Getting Started

The plugin automatically intializes itself using values from .env. You can also set them at runtime using the `set_endpoint()`, `set_project()`, `set_key()` and `set_self_signed()` methods.

See [Configuration](configuration.md) for more details.

## Requirements

- Godot 4.x
- Appwrite Server or Appwrite Cloud

## Installation

1. Open the AssetLib tab inside the Godot 4 editor.
2. Search for Appwrite server SDK.
3. Download and install plugin.
4. Enable the plugin from Project -> Project Settings -> Plugins.

### Quick Test connection to Appwrite server 

```gdscript
extends Node

func _ready():
    {{spec.title | caseUcfirst}}.ping()
```