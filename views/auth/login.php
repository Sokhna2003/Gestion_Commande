

<div class="max-w-md w-full bg-white p-8 rounded-xl shadow-md border border-gray-200 space-y-6">
    
    <!-- Titre de la page -->
    <div class="text-center">
        <h2 class="text-3xl font-extrabold text-indigo-900 tracking-tight">GES-COMMANDE</h2>
        <p class="text-sm text-gray-500 mt-1">Connectez-vous pour accéder au tableau de bord</p>
    </div>

    <!-- Message d'erreur global (Identifiants incorrects) -->
    <?php if (isset($errors['global'])): ?>
        <div class="p-3 bg-red-50 border border-red-200 text-red-800 text-sm font-medium rounded-md text-center">
            <?= $errors['global'] ?>
        </div>
    <?php endif; ?>

    <!-- Formulaire de connexion -->
    <form action="" method="POST" class="space-y-4">
        
        <!-- Champ Email -->
        <div>
            <label class="block text-xs font-semibold text-gray-700 uppercase mb-1">Adresse Email</label>
            <input type="text" name="email" value="<?= $_POST['email'] ?? '' ?>" placeholder="admin@example.com"
                    class="w-full px-3 py-2 border <?= isset($errors['emailVide']) ? 'border-red-400 focus:ring-red-500' : 'border-gray-300 focus:ring-indigo-500' ?> rounded-md text-sm focus:ring-1 focus:outline-none transition">
            <?php if (isset($errors['emailVide'])): ?>
                <span class="text-red-500 text-xs mt-1 block font-medium"><?= $errors['emailVide'] ?></span>
            <?php endif; ?>
        </div>

        <!-- Champ Mot de passe -->
        <div>
            <label class="block text-xs font-semibold text-gray-700 uppercase mb-1">Mot de passe</label>
            <input type="password" name="password" placeholder="••••••••"
                    class="w-full px-3 py-2 border <?= isset($errors['passwordVide']) ? 'border-red-400 focus:ring-red-500' : 'border-gray-300 focus:ring-indigo-500' ?> rounded-md text-sm focus:ring-1 focus:outline-none transition">
            <?php if (isset($errors['passwordVide'])): ?>
                <span class="text-red-500 text-xs mt-1 block font-medium"><?= $errors['passwordVide'] ?></span>
            <?php endif; ?>
        </div>
        
        <input type="hidden" name="controller" value="auth">
        <input type="hidden" name="action" value="login">

        <!-- Bouton Connexion -->
        <div class="pt-2">
            <button type="submit" name="connect" 
                    class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold text-sm py-2.5 px-4 rounded-md shadow-sm transition tracking-wide cursor-pointer">
                Se connecter
            </button>
        </div>

    </form>

    <div class="text-center text-xs text-gray-400 border-t pt-4">
        © 2026 Group Commandes — Tous droits réservés
    </div>

</div>

