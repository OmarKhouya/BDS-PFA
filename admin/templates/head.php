<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="../../public/css/bootstrap.min.css" />
<link rel="stylesheet" href="../../public/fonts/fontawesome-6.3.0/css/all.min.css" />
<link rel="stylesheet" href="../../public/css/style.css">
<link rel="icon" href="../../assets/images/iconTitle.png" type="png" />
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Epilogue&display=swap" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="../../public/fonts/fontawesome-6.3.0/js/all.min.js" defer></script>
<script src="../../public/js/bootstrap.bundle.min.js" defer></script>
<script>window.gtranslateSettings = {"default_language":"fr","detect_browser_language":true,"languages":["fr","ar"],"wrapper_selector":".gtranslate_wrapper","flag_size":24,"switcher_horizontal_position":"inline"}</script>
<script src="https://cdn.gtranslate.net/widgets/latest/dwf.js" defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script>
  $(document).ready(function() {
    $('select').select2({
      language: {
        noResults: function() {
          return "Aucun résultat trouvé";
        }
      },
      theme: 'bootstrap',
      
    });
    $('.select2-search__field').addClass('form-control');
    $('.select2-search__field').attr('placeholder','Salam');
    $('.select2-container').addClass('form-select');
    $('.select2-dropdown').addClass('dropdown-menu');
  });
</script>
<style>
    @media only screen and (max-width:430px){
        #navShortCuts{
            display: none;
        }
    }
    .all-cards-hover .card:hover{
        color: black;
        text-shadow: 0 0 5px #FFF, 0 0 10px #FFF, 0 0 15px #FFF, 0 0 20px #49ff18, 0 0 30px #49FF18, 0 0 40px #49FF18, 0 0 55px #49FF18, 0 0 75px #49ff18;
    }
</style>