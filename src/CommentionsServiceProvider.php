<?php

namespace Bura1\Commentions;

use Filament\Support\Assets\Css;
use Filament\Support\Assets\Js;
use Filament\Support\Facades\FilamentAsset;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Gate;
use Bura1\Commentions\Comment as CommentModel;
use Bura1\Commentions\Events\UserWasMentionedEvent;
use Bura1\Commentions\Filament\Infolists\Components\CommentsWithoutCreate;
use Bura1\Commentions\Listeners\SendUserMentionedNotification;
use Bura1\Commentions\Livewire\Comment;
use Bura1\Commentions\Livewire\CommentCreate;
use Bura1\Commentions\Livewire\CommentCustom;
use Bura1\Commentions\Livewire\CommentList;
use Bura1\Commentions\Livewire\CommentListCustom;
use Bura1\Commentions\Livewire\Comments;
//use Bura1\Commentions\Livewire\Comments2;
use Bura1\Commentions\Livewire\CommentsOnlyList;
use Bura1\Commentions\Livewire\Reactions;
use Bura1\Commentions\Livewire\SubscriptionSidebar;
use Livewire\Livewire;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class CommentionsServiceProvider extends PackageServiceProvider
{
    public static string $name = 'commentions';

    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name(static::$name)
            ->hasConfigFile()
            ->hasTranslations()
            ->hasViews()
            ->hasMigrations([
                'create_commentions_tables',
                'create_commentions_reactions_table',
                'create_commentions_subscriptions_table',
            ]);
    }

    public function packageBooted(): void
    {
        Livewire::component('commentions::comment', Comment::class);
        Livewire::component('commentions::comment-list', CommentList::class);
        Livewire::component('commentions::comments', Comments::class);
//        Livewire::component('commentions::comments2', Comments2::class);
        Livewire::component('commentions::comment-create', CommentCreate::class);
        Livewire::component('commentions::comments-only-list', CommentsOnlyList::class);
        Livewire::component('commentions::comment-list-custom', CommentListCustom::class);
        Livewire::component('commentions::comment-custom', CommentCustom::class);
        Livewire::component('commentions::reactions', Reactions::class);
        Livewire::component('commentions::subscription-sidebar', SubscriptionSidebar::class);

        FilamentAsset::register(
            [
                Js::make('commentions-scripts', __DIR__ . '/../resources/dist/commentions.js'),
            ],
            'bura1-development/' . static::$name
        );

        FilamentAsset::register(
            [
                Css::make('commentions', __DIR__ . '/../resources/dist/commentions.css'),
            ],
            'bura1-development/' . static::$name
        );

        Gate::policy(CommentModel::class, config('commentions.comment.policy'));

        // Allow publishing of translation files with a custom tag
        $this->publishes([
            __DIR__ . '/../resources/lang' => resource_path('lang/vendor/commentions'),
        ], 'commentions-lang');

        if (config('commentions.notifications.mentions.enabled', false)) {
            $listenerClass = (string) config('commentions.notifications.mentions.listener', SendUserMentionedNotification::class);
            Event::listen(UserWasMentionedEvent::class, $listenerClass);
        }
    }
}
