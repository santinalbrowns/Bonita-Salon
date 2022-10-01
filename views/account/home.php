<?php

use app\core\Application;

?>


<?php if (Application::isGuest()) : ?>
<div class="banner">
    <div class="overlay">
        <div class="content">

            <div class="title">
                <font>Di</font>scover <br>
                <font>the</font> Secrets <br>
                <font>Of</font> Beauty
            </div>

            <div class="row">
                <div class="column">
                    <a href="#service" class="btn-outline">View Services</a>

                    <a href="/register" class="btn">Join Now</a>
                </div>

                <div class="column">
                    <h1>In our hands</h1>
                    <h1>Your hair comes alive</h1>
                    <p>Your beauty truly matters to us</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="service" class="services">

    <div class="column">
        <div class="head">
            <div class="title">Services</div>

            <div class="desc">We are experienced <br>
                in making you <br>
                More Beautiful</div>
        </div>

        <div class="body">
            <div class="line"></div>

            <div class="title">Beauty <br>treatments</div>

            <p>
                We are an all-inclusive beauty company
                that focuses on our guests' individual needs and
                desires, making us the most flexible salon:
                offering quality service, expertise,
                and outcomes that exceed standards!
            </p>

            <a href="/login" class="btn">Get started</a>

        </div>
    </div>


    <div class="body-column">
        <div class="img"></div>

        <div class="service">
            <div class="name">Hair Styles</div>
            <div class="desc">
                We have a wide range of hairstyles,
                that best fits your needs.
            </div>
        </div>

        <div class="service">
            <div class="name">Facials & Makeups</div>
            <div class="desc">
                We have a range of skincare treatments,
                eyebrow shaping and makeup sessions.
            </div>
        </div>

        <div class="service">
            <div class="name">Nails & Polish</div>
            <div class="desc">
                Nails are filed, shaped and completed
                with our wide range of nail polish.
            </div>
        </div>
    </div>
</div>

<div id="gallery" class="gallery">
    <div class="head">
        <div class="title">Gallery</div>
        <div class="desc">Our wide range of hairstyles, makeup and nail art.</div>
    </div>

    <div class="row">
        <div class="img1"></div>
        <div class="img2"></div>
        <div class="img3"></div>
    </div>
</div>

<div id="about" class="about">
    <div class="overlay">
        <div class="head">
            <div class="title">About us</div>
        </div>


        <div class="card">
            <div class="line"></div>
            <div class="title">Mission</div>
            <p>
                Our mission at Bonita Salon is to
                provide a friendly, personalized service
                through a team of highly skilled and creative
                professionals. Teamwork is our most valuable
                asset which ensures our clients are always number
                one, and we strive to exceed your expectations.
            </p>
        </div>

        <div class="card">
            <div class="line"></div>
            <div class="title">Vision</div>
            <p>
                Honesty, integrity and trust are at the forefront
                of Bonita Salon.
                We understand the needs and wants of both
                our clients and our team and,
                by incorporating these jet values at every
                level of the process, we retain long lasting
                mutually beneficial relationships.
            </p>
        </div>

        <div class="card">
            <div class="line"></div>
            <div class="title">Who we are</div>
            <p>
                Since its debut 141 years ago,
                Bonita Salon has continually reinvented itself,
                playing a pivotal role in the professional beauty industry.
                Today, Bonita Salon continues to shine a
                spotlight on all things beauty through inspiring
                and relevant content that reaches out to thousands of clients.
            </p>
        </div>

    </div>
</div>

<div id="contact" class="contact">
    <div class="head">
        <div class="title">Contact us</div>
    </div>

    <div class="row">
        <div class="column">
            <form action="" method="post">
                <div class="row">
                    <input type="text" name="" id="" placeholder="First name">
                    <input type="text" name="" id="" placeholder="Last name">
                </div>

                <div class="row">
                    <input type="text" name="" id="" placeholder="Phone">
                    <input type="email" name="" id="" placeholder="Email">
                </div>
                <textarea name="" id="" cols="30" rows="10" placeholder="Message"></textarea>

                <button>Submit</button>
            </form>
        </div>

        <div class="column">
            <div class="title">Address</div>
            <div class="line"></div>
            <p>P.O Box 346</p>
            <p>Blantyre 3</p>
        </div>
    </div>
</div>
<?php else : ?>

<div class="client">
    <div class="conatiner">
        <!-- Cards -->
        <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
            <!-- Card -->
            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                <div
                    class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z">
                        </path>
                    </svg>
                </div>
                <div>
                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                        Total Appointments
                    </p>
                    <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                        <?php echo count($appointments); ?>
                    </p>
                </div>
            </div>
            <!-- Card -->
            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                <div class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500">
                    <i class="bx bxs-bookmarks"></i>
                </div>
                <div>
                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                        Accepted
                    </p>
                    <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                        <?php echo count($accepted); ?>
                    </p>
                </div>
            </div>
            <!-- Card -->
            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                <div class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500">
                    <i class="bx bxs-group"></i>
                </div>
                <div>
                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                        Denied
                    </p>
                    <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                        <?php echo count($denied); ?>
                    </p>
                </div>
            </div>
            <!-- Card -->
            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                <div class="p-3 mr-4 text-teal-500 bg-teal-100 rounded-full dark:text-teal-100 dark:bg-teal-500">
                    <i class="bx bxs-time"></i>
                </div>
                <div>
                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                        Pending
                    </p>
                    <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                        <?php echo count($pending); ?>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <?php if (Application::$app->session->getFlash('error')): ?>
        <?php echo Application::$app->session->getFlash('error'); ?>
    <?php endif; ?>

    <!-- All Apointments table -->
    <?php if (!empty($appointments)) : ?>
    <!-- New Table -->
    <div class="conatiner">
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">Service</th>
                            <th class="px-4 py-3">Status</th>
                            <th class="px-4 py-3">Booking Date</th>
                            <th class="px-4 py-3">Action</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        <?php foreach ($appointments as $appointment) : ?>
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3">
                                <span
                                    class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                    <?php echo $appointment->name; ?>
                                </span>
                            </td>
                            <td class="px-4 py-3 text-xs">
                                <span
                                    class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                    <?php echo $appointment->status; ?>
                                </span>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                <?php echo $appointment->date; ?>
                            </td>
                            <td class="px-4 py-3" style="position: relative;">
                                <div class="flex items-center space-x-4 text-sm">
                                    <button onclick='showRescheduModal("<?php echo 'modal' . $appointment->id; ?>", "<?php echo 'closeModalBtn' . $appointment->id; ?>")'
                                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5
                                        text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none
                                        focus:shadow-outline-gray"
                                        aria-label="Edit">
                                        <i class="bx bx-edit" style="font-size: 20px;"></i>
                                    </button>

                                    <div id="<?php echo 'modal' . $appointment->id; ?>" class="model">
                                        <form method="POST">
                                            <label class="block text-sm">
                                                <span class="text-gray-700 dark:text-gray-400">Date</span>
                                            </label>
                                            <input type="date" required
                                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                                name="date" value="<?php echo $appointment->date; ?>" />

                                            <input type="hidden" name="action" value="reschedule">
                                            <input type="hidden" name="id" value="<?php echo $appointment->id; ?>">

                                            <button
                                                class="w-full px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                                Reschedule
                                            </button>
                                        </form>

                                        <button id="<?php echo 'closeModalBtn' . $appointment->id; ?>"
                                            class="w-full px-5 py-3 text-sm font-medium leading-5 text-white text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray">
                                            Cancel
                                        </button>

                                    </div>

                                    <form method="POST">
                                        <input type="hidden" name="action" value="delete">
                                        <input type="hidden" name="id" value="<?php echo $appointment->id; ?>">

                                        <button
                                            class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                            aria-label="Delete">
                                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <!-- Booking an appointmert if there is a service -->
    <?php if ($services) : ?>
    <!-- Modal backdrop. -->
    <div x-show="isModalOpen" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-30 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center">
        <!-- Modal -->
        <div x-show="isModalOpen" x-transition:enter="transition ease-out duration-150"
            x-transition:enter-start="opacity-0 transform translate-y-1/2" x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0  transform translate-y-1/2" @click.away="closeModal"
            @keydown.escape="closeModal"
            class="w-full px-6 py-4 overflow-hidden bg-white rounded-t-lg dark:bg-gray-800 sm:rounded-lg sm:m-4 sm:max-w-xl"
            role="dialog" id="modal">
            <!-- Remove header if you don't want a close icon. Use modal body to place modal tile. -->
            <div class="flex justify-end">
                <button
                    class="inline-flex items-center justify-center w-6 h-6 text-gray-400 transition-colors duration-150 rounded dark:hover:text-gray-200 hover: hover:text-gray-700"
                    aria-label="close" @click="closeModal">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" role="img" aria-hidden="true">
                        <path
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd" fill-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <!-- Modal body -->
            <form method="POST">
                <div class="mt-4 mb-6">
                    <!-- Modal title -->
                    <p class="mb-2 text-lg font-semibold text-gray-700 dark:text-gray-300">
                        Book Appointment
                    </p>

                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">
                            Select the service
                        </span>
                        <select name="service_id"
                            class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                            <?php foreach ($services as $service) : ?>
                            <option value="<?php echo $service->id; ?>">
                                <?php echo $service->name; ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </label>

                    <label class="block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Date</span>
                        <input type="date" required
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            name="date" />
                    </label>

                </div>
                <div
                    class="flex flex-col items-center justify-end px-6 py-3 -mx-6 -mb-4 space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row bg-gray-50 dark:bg-gray-800">
                    <input type="hidden" name="action" value="book">
                    <button
                        class="w-full px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                        Book Now
                    </button>
                </div>
            </form>
        </div>
    </div>
    <!-- End of modal backdrop -->
    <?php else : ?>
    <!-- Modal backdrop. This what you want to place close to the closing body tag -->
    <div x-show="isModalOpen" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-30 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center">
        <!-- Modal -->
        <div x-show="isModalOpen" x-transition:enter="transition ease-out duration-150"
            x-transition:enter-start="opacity-0 transform translate-y-1/2" x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0  transform translate-y-1/2" @click.away="closeModal"
            @keydown.escape="closeModal"
            class="w-full px-6 py-4 overflow-hidden bg-white rounded-t-lg dark:bg-gray-800 sm:rounded-lg sm:m-4 sm:max-w-xl"
            role="dialog" id="modal">
            <!-- Remove header if you don't want a close icon. Use modal body to place modal tile. -->
            <div class="flex justify-end">
                <button
                    class="inline-flex items-center justify-center w-6 h-6 text-gray-400 transition-colors duration-150 rounded dark:hover:text-gray-200 hover: hover:text-gray-700"
                    aria-label="close" @click="closeModal">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" role="img" aria-hidden="true">
                        <path
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd" fill-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <!-- Modal body -->
            <div class="mt-4 mb-6">
                <!-- Modal title -->
                <p class="mb-2 text-lg font-semibold text-gray-700 dark:text-gray-300">
                    Book Appointment
                </p>
                <!-- Modal description -->
                <p class="text-sm text-gray-700 dark:text-gray-400">
                    Sorry there are no services to book. Please try again later.
                </p>
            </div>
            <div
                class="flex flex-col items-center justify-end px-6 py-3 -mx-6 -mb-4 space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row bg-gray-50 dark:bg-gray-800">
                <button @click="closeModal"
                    class="w-full px-5 py-3 text-sm font-medium leading-5 text-white text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray">
                    Cancel
                </button>
            </div>
        </div>
    </div>
    <!-- End of modal backdrop -->
    <?php endif; ?>
</div>

<script src="./assets/js/app.js" ?></script>
<?php endif; ?>