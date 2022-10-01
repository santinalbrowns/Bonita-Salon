<div class="flex flex-col overflow-y-auto md:flex-row">
    <div class="h-32 md:h-auto md:w-1/2">
        <img aria-hidden="true" class="object-cover w-full h-full dark:hidden" src="./assets/img/happy.jpg" alt="Office" />
        <img aria-hidden="true" class="hidden object-cover w-full h-full dark:block" src="./assets/img/happy.jpg" alt="Office" />
    </div>
    <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
        <div class="w-full">
            <?php $form = app\core\form\Form::begin('', "post"); ?>
            <h1 class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200">
                Login
            </h1>

            <?php echo $form->field($model, 'email'); ?>

            <?php echo $form->field($model, 'password')->passwordField(); ?>

            <button class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">Login</button>

            <?php echo app\core\form\Form::end(); ?>

            <p class="mt-1" style="margin-top: 20px;">Client?
                <a class="text-sm font-medium text-purple-600 dark:text-purple-400 hover:underline" href="/login">
                    Login
                </a>
            </p>
        </div>
    </div>
</div>