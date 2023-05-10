<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\Book;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use App\Policies\ArticlePolicy;
use App\Models\Article;
class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
        Article::class => ArticlePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        // books
        Gate::define('update-book', function (User $user, Book $book) {
            return $user->id === $book->user_id;
        });
        Gate::define('delete-book', function (User $user, Book $book) {
            return $user->id === $book->user_id;
        });
        // articles





    }
}
