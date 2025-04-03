<div role="alert"
    @class([
        'alert', // Ajout de la classe "alert" pour que le JS fonctionne
        'mb-4 relative flex w-full p-3 text-sm text-white',
        $type == 'success' ? "bg-green-600 rounded-md" : "bg-red-500 rounded-md"
    ])>
    {{ $slot }}
    <button
        class="flex items-center justify-center transition-all w-8 h-8 rounded-md text-white hover:bg-white/10 active:bg-white/10 absolute top-1.5 right-1.5"
        type="button">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-5 w-5"
             stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
        </svg>
    </button>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        document.querySelectorAll(".alert button").forEach(button => {
            button.addEventListener("click", function () {
                let alertBox = this.closest(".alert");
                alertBox.classList.add("fade-out");
                setTimeout(() => alertBox.style.display = "none", 300);
            });
        });
    });
</script>

<style>
    .fade-out {
        opacity: 0;
        transition: opacity 0.3s ease-out;
    }

</style>


