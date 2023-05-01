<script src="{{ asset('assets/js/jquery.min.js') }}"></script>

<script src="{{ asset('assets/plugins/bootstrap/js/popper.min.js') }}"></script>

<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

<script src="{{ asset('assets/plugins/sidemenu/sidemenu.js') }}"></script>

<script src="{{ asset('assets/plugins/p-scroll/perfect-scrollbar.js') }}"></script>

<script src="{{ asset('assets/plugins/p-scroll/pscroll.js') }}"></script>

<script src="{{ asset('assets/js/sticky.js') }}"></script>

<script src="{{ asset('assets/js/themeColors.js') }}"></script>

<script src="{{ asset('assets/js/custom.js') }}"></script>

<!-- Listen for the 'languageChanged' event -->
<script>
    document.addEventListener('livewire:load', function() {
        Livewire.on('languageChanged', function(languageCode) {
            console.log('Selected language:', languageCode);
            // Refresh the page to apply the language changes
            window.location.reload();
        });
    });
</script>

@yield('scripts')
