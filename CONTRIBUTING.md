# Contributing to SEA Cinema Tix

Thank you for considering contributing to SEA Cinema Tix project! This document outlines some guidelines to help you get started.

## Setting up the development environment

Before you start contributing to the project, you will need to set up your development environment. To get started, you should have the following software installed:

- [PHP](https://www.php.net/)
- [Composer](https://getcomposer.org/)
- [MySQL](https://www.mysql.com/)

You should also have [Git](https://git-scm.com/) installed to clone the repository and submit merge requests.

To get started with the project, you can follow these steps:

1. Fork this repository.
2. Clone your forked repository to your local machine.
3. Install dependencies: `composer install && npm install`
4. Create a copy of the `.env.example` file and rename it to `.env`. Update the database credentials as needed.
5. Generate an application key: `php artisan key:generate`
6. Run database migrations: `php artisan migrate`
7. Start the development server: `php artisan serve` and `npm run dev`

## Submitting bug reports

If you encounter any issues with the project, please submit a bug report. To do so, please follow these guidelines:

1. Check the existing issues to see if your bug has already been reported.
2. If your bug has not been reported, create a new issue with a descriptive title and detailed steps to reproduce the bug.
3. Include any relevant error messages or screenshots.
4. Assign the `bug` label to the issue.

## Making feature requests

If you have an idea for a new feature, you can submit a feature request. To do so, please follow these guidelines:

1. Check the existing issues and merge requests to see if your feature request has already been submitted.
2. If your feature request has not been submitted, create a new issue with a descriptive title and detailed description of the feature.
3. Assign the `enhancement` label to the issue.

## Submitting code changes

If you would like to submit a code change, please follow these guidelines:

1. Create a new branch for your changes: `git checkout -b {feat,fix,refactor,docs,ci,chore,test}/my-new-branch-name`
2. Make your changes and don't forget to check the code formatting with `composer lint`. Once you are satisfied with your changes, commit them with a descriptive message using the [Conventional Commits](https://www.conventionalcommits.org/en/v1.0.0) format.
3. Push your changes to your fork: `git push origin {feat,fix,refactor,docs,ci,chore,test}/my-new-branch-name`
4. Create a merge request against the `main` branch of the original repository.
5. Assign the appropriate labels to the merge request.

## Code standards

When submitting code changes, please adhere to the following standards:

- Use [PSR-12](https://www.php-fig.org/psr/psr-12) coding standards.
- Follow [Laravel's coding standards](https://laravel.com/docs/10.x/contributions#coding-style).
- Write tests for your changes.

## Conclusion

Thank you for your interest in contributing to SEA Cinema Tix project. By following these guidelines, you can help ensure a smooth and collaborative development process. If you have any questions or concerns, feel free to open an issue or contact the project maintainers.
