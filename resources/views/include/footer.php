<!-- scroll reveal -->
<script src="https://unpkg.com/scrollreveal@4.0.0/dist/scrollreveal.min.js"></script>
<script>
   const sr = ScrollReveal ({
      distance: '65px',
      duration: 2600,
      delay: 450,
      reset: true
});

sr.reveal('.hero_text',{delay:100, origin:'top'});
sr.reveal('.hero_illustrator',{delay:150, origin:'top'});
sr.reveal('.top_header',{delay:200, origin:'top'});
sr.reveal('.link',{delay:200, origin:'left'});
sr.reveal('.footer',{delay:200, origin:'bottom'});

</script>

<!-- custom js for modal -->
<?= isset($_SESSION['customUrl']) ? '<script src="views/assets/js/index.js"></script>' : ''; ?>

<!-- bootstrap js -->
<script src="views/assets/js/bootstrap.min.js"></script>
<script src="views/assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<?php
unset(
   $_SESSION['success'],
   $_SESSION['error'],
   $_SESSION['customUrl']
);
?>