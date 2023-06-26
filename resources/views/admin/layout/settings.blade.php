@extends('admin.layout.app')

@section('content')
    <section>
        <div class="w-full p-6 mx-auto">
            <div class="flex flex-wrap -mx-3">
                <div class=" max-w-full px-3 w-2/12">
                    <div
                        class="relative flex flex-col h-full min-w-0 break-words bg-white border-0 shadow-soft-xl rounded-2xl bg-clip-border">
                        <div class="p-4 pb-0 mb-0 bg-white border-b-0 rounded-t-2xl">
                            <h3>Settings</h3>
                        </div>
                        <div class="flex-auto p-4">
                            <div class="items-center block w-auto max-h-screen overflow-auto h-sidenav grow basis-full">
                                <ul class="flex flex-col pl-0 mb-0" id="myTab" data-tabs-toggle="#myTabContent"
                                    role="tablist">
                                    <li class="mt-0.5 w-full">
                                        <button
                                            class="py-2.7 shadow-soft-xl text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap rounded-lg bg-white px-4 font-semibold text-slate-700 transition-colors tab"
                                            data-tab="1" type="button">
                                            <span
                                                class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Application</span>
                                        </button>
                                    </li>
                                    <li class="mt-0.5 w-full">
                                        <button
                                            class="tab py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors"
                                            type="button" data-tab="2">
                                            <span
                                                class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Tables</span>
                                        </button>
                                    </li>

                                    <li class="mt-0.5 w-full">
                                        <button
                                            class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors tab"
                                            type="button" data-tab="3">
                                            <span
                                                class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Billing</span>
                                        </button>
                                    </li>

                                    <li class="mt-0.5 w-full">
                                        <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors"
                                            href="#">
                                            <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">
                                                Virtual
                                                Reality</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mx-w-full px-3 w-8/12">
                    <div
                        class="relative flex flex-col h-full min-w-0 break-words bg-white border-0 shadow-soft-xl rounded-2xl bg-clip-border">
                        <div class="p-4 pb-0 mb-0 bg-white border-b-0 rounded-t-2xl">
                            <div class="tab-content" id="profile" data-tab="1">
                                <h5>Application Settings</h5>
                                <hr>
                                <div class="">
                                    <h6>General Settings</h6>
                                    <div class="">
                                        <form>
                                            <div class="flex flex-wrap">
                                                <div class="mx-w-full px-3 w-5/12">
                                                    <label for="first_name"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Application
                                                        name</label>
                                                    <input type="text" id="first_name"
                                                        class="pl-3 text-sm focus:shadow-soft-primary-outline ease-soft leading-5.6 relative -ml-px block min-w-0 w-full flex-auto rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 pr-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none focus:transition-shadow"
                                                        required name="app_name">
                                                </div>
                                                <div class="mx-w-full px-3 w-5/12">
                                                    <label for="first_name"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Change
                                                        application logo</label>
                                                    <input type="file" id="first_name"
                                                        class="pl-3 text-sm focus:shadow-soft-primary-outline ease-soft leading-5.6 relative -ml-px block min-w-0 w-full flex-auto rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 pr-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none focus:transition-shadow"
                                                        required name="app_logo">
                                                </div>
                                                <div class="mx-w-full px-3 w-5/12">
                                                    <label for="first_name"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Change
                                                        background image</label>
                                                    <input type="file" id="first_name"
                                                        class="pl-3 text-sm focus:shadow-soft-primary-outline ease-soft leading-5.6 relative -ml-px block min-w-0 w-full flex-auto rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 pr-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none focus:transition-shadow"
                                                        required name="background_img">
                                                </div>
                                            </div>
                                            <h6 class="pt-6">Landing page settings</h6>
                                            <div class="flex flex-wrap">
                                                <div class="mx-w-full px-3 w-5/12">
                                                    <label for="first_name"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Landing
                                                        page header</label>
                                                    <input type="text" id="first_name"
                                                        class="pl-3 text-sm focus:shadow-soft-primary-outline ease-soft leading-5.6 relative -ml-px block min-w-0 w-full flex-auto rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 pr-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none focus:transition-shadow"
                                                        required name="landing_header">
                                                </div>
                                                <div class="mx-w-full px-3 w-5/12">
                                                    <label for="first_name"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Landing
                                                        page message (recommended characters 150)</label>
                                                    <input type="text" id="first_name"
                                                        class="pl-3 text-sm focus:shadow-soft-primary-outline ease-soft leading-5.6 relative -ml-px block min-w-0 w-full flex-auto rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 pr-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none focus:transition-shadow"
                                                        required name="landing_page_message">
                                                </div>
                                                <div class="mx-w-full px-3 w-5/12">
                                                    <label for="first_name"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Copyright
                                                        text</label>
                                                    <input type="text" id="first_name"
                                                        class="pl-3 text-sm focus:shadow-soft-primary-outline ease-soft leading-5.6 relative -ml-px block min-w-0 w-full flex-auto rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 pr-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none focus:transition-shadow"
                                                        required name="coyright">
                                                </div>
                                            </div>
                                            <h6 class="pt-6">Invoice Settings</h6>
                                            <div class="flex flex-wrap">
                                                <div class="mx-w-full px-3 w-5/12">
                                                    <label for="first_name"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Invoice
                                                        Settings</label>
                                                    <input type="text" id="first_name"
                                                        class="pl-3 text-sm focus:shadow-soft-primary-outline ease-soft leading-5.6 relative -ml-px block min-w-0 w-full flex-auto rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 pr-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none focus:transition-shadow"
                                                        required name="company_name">
                                                </div>
                                            </div>
                                            <div class="py-12">
                                                <button type="submit"
                                                    class="text-black-600 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                                    Save
                                                </button>
                                                <button type="button"
                                                    class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Green</button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                            <div class="hidden tab-content" id="profile" data-tab="2">
                                <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the
                                    <strong class="font-medium text-gray-800 dark:text-white">Profile tab's associated
                                        content</strong>. Tab 2
                                </p>
                            </div>
                            <div class="hidden tab-content" id="profile" data-tab="3">
                                <p class="text-sm text-gray-500 dark:text-gray-400">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae veritatis nobis saepe
                                    ullam porro ad quis pariatur possimus, vero earum?
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


@push('scripts')
    <script>
        // Get all tab elements
        const tabs = document.querySelectorAll('.tab');
        // Get all tab content elements
        const tabContents = document.querySelectorAll('.tab-content');

        // Add click event listeners to each tab
        tabs.forEach(tab => {
            tab.addEventListener('click', () => {
                const tabId = tab.getAttribute('data-tab');

                // Remove active class from all tabs
                tabs.forEach(tab => tab.classList.remove('active'));
                // Remove hidden class from all tab content
                tabContents.forEach(content => content.classList.add('hidden'));

                // Add active class to clicked tab
                tab.classList.add('active');
                // Remove hidden class from corresponding tab content
                document.querySelector(`.tab-content[data-tab="${tabId}"]`).classList.remove('hidden');
            });
        });
    </script>
@endpush
