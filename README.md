# Get Url Contents eZ Twig Bundme

This bundles adds:

- a `get_url_contents` Twig function
- a `get_url_contents` eZ Publish legacy template operator

Both share the same behaviour:

- perform a GET HTTP request to the URL passed as argument, using curl
- then, if the request succeeded and the response code is 200, return the response body as string
- otherwise, return an empty string

## Install

Just use Composer:

`composer require code-rhapsodie/get-url-contents-ez-twig-bundle`

## Usage

In Twig:

```twig
{{ get_url_contents('https://host/my_external_file.html') }}
```

In eZ Publish legacy templates:

```
{get_url_contents('https://host/my_external_file.html')}
```
