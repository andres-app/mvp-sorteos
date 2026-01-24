</main>

<footer class="py-8 text-center text-sm text-slate-400">
  © <?= date('Y') ?> mvp-sorteos
</footer>

<script src="<?= $base ?>/assets/js/app.js"></script>

<!-- TOAST CONTAINER -->
<div id="toast-container"
     class="fixed top-6 right-6 z-[9999] space-y-3">
</div>

<script>
function showToast(message, type = 'info', duration = 3500) {
  const container = document.getElementById('toast-container');

  if (!container) return;

  const toast = document.createElement('div');
  toast.className = `toast ${type}`;
  toast.textContent = message;

  container.appendChild(toast);

  setTimeout(() => {
    toast.style.opacity = '0';
    toast.style.transform = 'translateX(20px)';
    setTimeout(() => toast.remove(), 300);
  }, duration);
}
</script>

<?php if (isset($_SESSION['toast'])): ?>
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      showToast(
        <?= json_encode($_SESSION['toast']['message']) ?>,
        <?= json_encode($_SESSION['toast']['type']) ?>
      );
    });
  </script>
  <?php unset($_SESSION['toast']); ?>
<?php endif; ?>

</body>
</html>
