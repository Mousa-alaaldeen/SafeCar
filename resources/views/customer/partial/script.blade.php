<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="lib/wow/wow.min.js"></script>
<script src="lib/easing/easing.min.js"></script>
<script src="lib/waypoints/waypoints.min.js"></script>
<script src="lib/counterup/counterup.min.js"></script>
<script src="lib/owlcarousel/owl.carousel.min.js"></script>
<script src="lib/tempusdominus/js/moment.min.js"></script>
<script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
<script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/inputmask/5.0.7-beta.20/inputmask.min.js"></script>


<!-- Template Javascript -->
<script src="{{asset('assets/js/main.js')}}"></script>
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script>document.addEventListener('DOMContentLoaded', function () {
    new Swiper('.swiper-container', {
        slidesPerView: 4,     
        spaceBetween: 20,      
        loop: true,              
        autoplay: {
            delay: 3000,         
            disableOnInteraction: false, 
        },
        breakpoints: {
            0: {
                slidesPerView: 1, 
            },
            768: {
                slidesPerView: 2, 
            },
            1024: {
                slidesPerView: 4, 
            },
        },
    });
});

var swiper = new Swiper('.swiper-container', {
    slidesPerView: 3,
    spaceBetween: 20,
    loop: true,
    autoplay: {
        delay: 3000,
        disableOnInteraction: false,
    },
});

</script>
<script>
    document.getElementById('car_license_plate').addEventListener('input', function (e) {
        let value = e.target.value;

        // Remove all non-numeric characters
        value = value.replace(/\D/g, '');

        // Format as XX-XXXXX
        if (value.length >= 3) {
            value = value.substring(0, 2) + '-' + value.substring(2, 7);
        }

        e.target.value = value;
    });
</script>



<script>
    const startYear = 2009;
    const currentYear = new Date().getFullYear();
    const yearsExperience = currentYear - startYear;
    document.getElementById('years-experience').textContent = yearsExperience;
</script>



<script>

    document.getElementById('serviceSearch').addEventListener('keyup', function () {
        const searchQuery = this.value.toLowerCase();
        const serviceItems = document.querySelectorAll('.service-item');
        serviceItems.forEach(item => {
            const serviceName = item.querySelector('.card-title').textContent.toLowerCase();
            if (serviceName.includes(searchQuery)) {
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        });
    });
</script>
