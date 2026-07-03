# Authentication

When using OAuth2, you need to pass the following redirect URL to SDK: 

```
Success URL: http://localhost:8888
Failure URL: http://localhost:8888/failure
```

Unlike mobile and desktop frameworks that provide a unified API for custom URL schemes, Godot targets multiple platforms and custom URL scheme registration is platform-specific. There is currently no cross-platform API in Godot to configure this automatically.

To provide a consistent authentication flow across the supported platforms, we are using a different approach to handle the OAuth2 authentication.

The SDK starts a lightweight local TCP server on port `8888` during OAuth authentication. After the user signs in, Appwrite redirects the browser to URL, allowing SDK to receive the response from the Appwrite server.

This approach requires no platform-specific URL scheme registration and works consistently across all platforms.

However, currently, you need to manually pass the URLs to SDK. We are working to automate this process. In future you can expect it to be plug and play.

#### Why not use a custom URL scheme?
Custom URL schemes must be registered differently on each operating system (Windows, macOS, linux, Android, iOS, etc). Using a local callback server provides a single cross-platform implementation, keeping the authentication flow identical regardless of the build target.