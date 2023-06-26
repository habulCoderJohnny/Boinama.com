@extends('admin.layout.app')

@section('content')
    <style>
        .tabs {
            display: flex;
        }

        .tab {
            cursor: pointer;
            padding: 0.5rem 1rem;
            background-color: #edf2f7;
            border: 1px solid #e2e8f0;
        }

        .tab:hover {
            background-color: #e2e8f0;
        }

        .tab-content {
            padding: 1rem;
            border: 1px solid #e2e8f0;
        }
    </style>
    <div class="tabs">
        <div class="tab" data-tab="1">
            Tab 1
        </div>
        <div class="tab" data-tab="2">
            Tab 2
        </div>
        <div class="tab" data-tab="3">
            Tab 3
        </div>
    </div>

    <div class="tab-content" data-tab="1">
        Content for Tab 1
    </div>
    <div class="tab-content hidden" data-tab="2">
        Content for Tab 2
    </div>
    <div class="tab-content hidden" data-tab="3">
        Content for Tab 3
    </div>
@endsection

@push('scripts')
    <script>
        const tabs = document.querySelectorAll('.tab');

        const tabContents = document.querySelectorAll('.tab-content');


        tabs.forEach(tab => {
            tab.addEventListener('click', () => {
                const tabId = tab.getAttribute('data-tab');
                tabs.forEach(tab => tab.classList.remove('active'));
                tabContents.forEach(content => content.classList.add('hidden'));
                tab.classList.add('active');
                document.querySelector(`.tab-content[data-tab="${tabId}"]`).classList.remove('hidden');
            });
        });
    </script>
@endpush
