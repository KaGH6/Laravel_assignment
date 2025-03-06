<x-layout>
    <x-slot:title>
        Sign in
    </x-slot:title>

    <div class="auth-page">
        <div class="container page">
            <div class="row">
                <div class="col-md-6 offset-md-3 col-xs-12">
                    <h1 class="text-xs-center">Sign in</h1>
                    <p class="text-xs-center">
                        <a href="/register">Need an account?</a>
                    </p>

                    <ul class="error-messages">
                        <li>That email is already taken</li>
                    </ul>

                    <form action="{{ route('auth.signIn') }}" method="POST">
                        @csrf

                        <fieldset class="form-group">
                            <input class="form-control form-control-lg" type="email" name="email" placeholder="Email" />
                        </fieldset>
                        <fieldset class="form-group">
                            <input class="form-control form-control-lg" type="password" name="password" placeholder="Password" />
                        </fieldset>
                        <button class="btn btn-lg btn-primary pull-xs-right" type="submit">Sign in</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>