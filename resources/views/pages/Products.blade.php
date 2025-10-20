<x-app-layout>

  @livewire('products')

    <script>
        function toggleSidebar() {
            const mobileSidebar = document.getElementById('mobileSidebar');
            mobileSidebar.classList.toggle('hidden');
        }
    </script>
</x-app-layout>
