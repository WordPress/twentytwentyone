# Contributing to Twenty Twenty-One

Howdy, it’s really great you want to contribute to the new default theme for the WordPress 5.6 release! 

For early development, Twenty Twenty-One will remain on GitHub. Once it reaches a usable and stable state, the theme will be moved into WordPress Core and all development will happen in SVN and Trac. Until then, follow this document for guidance.

There are three primary ways to contribute:

1. [Contributing to issues](#contributing-to-issues)
2. [Reviewing pull requests](#reviewing-pull-requests)
3. [Contributing code](#contributing-code)

## Contributing to issues 

[GitHub issues](https://github.com/WordPress/twentytwentyone/issues) are how we track discrete changes to the theme that need to be discussed and completed. Ideally, all changes to the theme are broken down into issues that can be addressed by discussion or a pull request.

Before creating an issue, please search the [existing issues](https://github.com/WordPress/twentytwentyone/issues) to see if it has been discussed before. If not, create an issue and the repo maintainers will add labels as appropriate. 

Please be as descriptive and succinct as possible through text, screenshots, and screen recordings to communicate the issue.

_Note: We are not using Trac for issue reporting until the theme is moved into WordPress Core._


## Reviewing pull requests

All code changes happen through a [pull request](https://help.github.com/articles/creating-a-pull-request/) made by contributors, ideally associated with an issue.

If you're not already using Git, you may benefit from installing the [GitHub desktop application](https://desktop.github.com). This will allow you to [download the repository in  one click](https://help.github.com/desktop/guides/contributing-to-projects/cloning-a-repository-from-github-to-github-desktop/), keep it in sync, and easily [switch between different pull requests](https://help.github.com/desktop/guides/contributing-to-projects/accessing-a-pull-request-locally/). Once a pull request is selected in the application, create a zip file of the whole repository, and upload it to your site to test.

Otherwise, you can test a pull request by pulling down the associated branch, creating a zip file of the contents, and uploading to your WordPress site via the admin. This repository includes all compiled files, so it will install just like any other uploaded theme.

Once you've tested and reviewed, please report your findings by adding a review or comment to the pull request on GitHub.

## Contributing code

To submit code, please [fork the repository](https://help.github.com/articles/fork-a-repo/) and submit a [pull request](https://help.github.com/articles/creating-a-pull-request/). In your pull request's description, please explain your update and reference the associated issue you're fixing.

After you send your proposed changes, one of the theme's maintainers will test and review the pull request. After it's reviewed and the changes are accepted by at least one of the maintainers, someone will merge the pull request. 

_When you add a pull request, please also add in the description your WordPress.org username. We will then add it to [CONTRIBUTORS.md](/CONTRIBUTORS.md). This is a running list of all contributors and essential to giving everyone that has helped make this project props in Core._

### Getting started with development

Building the theme requires [node.js](https://nodejs.org/en/) to be installed. 

To install the project's dependencies and start a development server to watch for changes within the theme's sass: 

```sh
cd path/to/twentytwentyone
npm install
npm run watch
```

Twenty Twenty-One relies on [Sass](https://sass-lang.com/guide) which allows us to more easily share code between multiple stylesheets (`style.css`, `style-editor.css`, etc.).

More development scripts can be found in the [package.json](/package.json).

#### Using wp-env

To make it easier to get started with contributing Twenty Twenty-One includes [@wordpress/env](https://developer.wordpress.org/block-editor/packages/packages-env/), which is a project developed by the Gutenberg Project to allow for easy lightweight preconfigured local environments. 

wp-env requires [docker](https://docs.docker.com/get-docker/) to be installed and running. 

From the command line:

```sh
npm run wp-env start
```

If successful, you will see a message to the effect of `✔ WordPress started.` The local environment will be available at http://localhost:8888 (Username: admin, Password: password), and the Twenty Twenty-One available to activate via wp-admin. 

### Development best practices

Whatever you add, make sure you follow the theme review handbook requirements here: https://make.wordpress.org/themes/handbook/review/required/.

No assets may be added without also including:
- Source, such as a link.
- Copyright information, license, or public domain declaration.
The assets must be compatible with GPL version 2 or later, with the exception of fonts that may use SIL.

#### Accessibility

All code needs to follow and be tested against the [WordPress Accessibility coding standards](https://developer.wordpress.org/coding-standards/wordpress-coding-standards/accessibility/)

The Accessibility team has a handbook with [best practices](https://make.wordpress.org/accessibility/handbook/markup/) that you are recommended to read.

Information about how to test some of the accessibility requirements can be found here: https://make.wordpress.org/themes/handbook/review/accessibility/required/

#### Commit Messages

Here are some good ideas for commit messages:

- Keep them to a one line summary.
- Keep them short (50 chars or less).
- Make them relevant to the commit.

#### Linting

It is recommended to lint your code before submitting a pull request. The repository is configured with [automated checks](https://github.com/WordPress/twentytwentyone/actions) to enforce WordPress PHP and scss standards, both of which can be run locally. 

To lint sass:

```sh
npm run lint:scss
```

To lint PHP, [composer](https://getcomposer.org/download/) and its dependencies must be installed in addition to the node project dependencies:

```sh
composer install
./vendor/bin/phpcs
```
