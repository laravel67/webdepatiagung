
document.addEventListener("DOMContentLoaded", function() {
    const successMessage = "{{ session('success') }}";
    if (successMessage) {
        const toast = document.querySelector(".toaster");
        const progress = document.querySelector(".progress-toaster");
        toast.classList.add("active");
        progress.classList.add("active");
        const timer1 = setTimeout(() => {
            toast.classList.remove("active");
            clearTimeout(timer1);
            clearTimeout(timer2);
        }, 3000);
        const timer2 = setTimeout(() => {
            progress.classList.remove("active");
        }, 3300);
        const closeIcon = document.querySelector(".close-toastr");
        closeIcon.addEventListener("click", () => {
            toast.classList.remove("active");
            progress.classList.remove("active");
            clearTimeout(timer1);
            clearTimeout(timer2);
        });
        const hideToaster = () => {
            toast.classList.remove("active");
            progress.classList.remove("active");
            clearTimeout(timer1);
            clearTimeout(timer2);
        };
        timer1.onTimeout = hideToaster;
        timer2.onTimeout = hideToaster;
    }
});

