# Getting Started

The Appwrite SDK for Godot automatically intializes itself using values from .env. You can also set them at runtime using the `set_endpoint()`, `set_project()` and `set_self_signed()` methods.

Refer to [Configuration](configuration.md) guide for detailed information on how to configure the SDK.

## Requirements

- Godot 4.x
- An Appwrite Cloud or self-hosted Appwrite server

## Installation

1. Open the AssetLib tab inside the Godot 4 editor.
2. Search for Appwrite SDK.
3. Download and install plugin.
4. Enable the plugin from Project -> Project Settings -> Plugins.

## Create an Appwrite Project
1. Sign in to your Appwrite Console.
2. Create a new project(or open an existing one).
3. Add a platform for you game.
    - If you support HTML5 export also, choose Web.
    - Else choose appropriate platform for your game.
4. Copy the **Endpoint URL** and **Project ID** from API info section.

## Configure the SDK
Configure the SDK using either of the following methods:
* Recommended: Create a `.env` file at root containing you Appwrite configuration.
* Alternative: Set the values at runtime.

Refer to [Configuration](configuration.md) guide for detailed information on how to configure the SDK.

### Verify You Connection
1. Create a new scene.
2. Attach a script to the root node.
3. Add the following code:
```gdscript
extends Node

func _ready():
    var result = await Appwrite.ping()
    if result is AppwriteException:
        push_error(result.message)
        return
    print("Successfully connected to Appwrite!")
    print(result)
```
4. Run the scene.

If the SDK is configured correctly, the request will success and you'll receive a response from you Appwrite server, confirming that your Godot Project is connected successfully.