<header class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8 mt-8 mb-6">
    <h2 class="text-2xl sm:text-3xl font-bold text-gray-900">
        <?= isset($client) && !empty($client) && !isset($client['prenom']) ? "Modifier le client" : "Ajouter un nouveau client" ?>
    </h2>
    <p class="mt-1 text-sm text-gray-500">
        <?= isset($client) && !empty($client) && !isset($client['prenom']) ? "Modifiez les informations du client ci-dessous" : "Remplissez le formulaire pour ajouter un client" ?>
    </p>
</header>

<div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8 mb-12">
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">

        

        <form method="POST" class="grid grid-cols-2 gap-4">

            <!-- Prénom -->
            <div class="col-span-1">
                <label class="block text-xs font-medium text-gray-700 uppercase mb-1">Prénom</label>
                <input
                    type="text"
                    name="prenom"
                    value="<?= htmlspecialchars($client['prenom'] ?? $old['prenom'] ?? '') ?>"
                    class="mt-1 block w-full px-3 py-2 border <?= isset($errors['prenomVide']) ? 'border-red-400' : 'border-gray-300' ?> rounded-md text-sm focus:ring-1 focus:ring-indigo-500 focus:outline-none"
                >
                <?php if(isset($errors['prenomVide'])): ?>
                    <p class="mt-1 text-xs text-red-600"><?= $errors['prenomVide'] ?></p>
                <?php endif; ?>
            </div>

            <!-- Nom -->
            <div class="col-span-1">
                <label class="block text-xs font-medium text-gray-700 uppercase mb-1">Nom</label>
                <input
                    type="text"
                    name="nom"
                    value="<?= htmlspecialchars($client['nom'] ?? $old['nom'] ?? '') ?>"
                    class="mt-1 block w-full px-3 py-2 border <?= isset($errors['nomVide']) ? 'border-red-400' : 'border-gray-300' ?> rounded-md text-sm focus:ring-1 focus:ring-indigo-500 focus:outline-none"
                >
                <?php if(isset($errors['nomVide'])): ?>
                    <p class="mt-1 text-xs text-red-600"><?= $errors['nomVide'] ?></p>
                <?php endif; ?>
            </div>

            <!-- Email -->
            <div class="col-span-2">
                <label class="block text-xs font-medium text-gray-700 uppercase mb-1">Email</label>
                <input
                    type="email"
                    name="email"
                    value="<?= htmlspecialchars($client['email'] ?? $old['email'] ?? '') ?>"
                    class="mt-1 block w-full px-3 py-2 border <?= (isset($errors['email']) || isset($errors['emailDuplique'])) ? 'border-red-400' : 'border-gray-300' ?> rounded-md text-sm focus:ring-1 focus:ring-indigo-500 focus:outline-none"
                >
                <?php if(isset($errors['email'])): ?>
                    <p class="mt-1 text-xs text-red-600"><?= $errors['email'] ?></p>
                <?php endif; ?>
                <?php if(isset($errors['emailDuplique'])): ?>
                    <p class="mt-1 text-xs text-red-600"><?= $errors['emailDuplique'] ?></p>
                <?php endif; ?>
            </div>

            <!-- Téléphone -->
            <div class="col-span-1">
                <label class="block text-xs font-medium text-gray-700 uppercase mb-1">Téléphone</label>
                <input
                    type="text"
                    name="telephone"
                    value="<?= htmlspecialchars($client['telephone'] ?? $old['telephone'] ?? '') ?>"
                    class="mt-1 block w-full px-3 py-2 border <?= (isset($errors['telephoneVide']) || isset($errors['telephoneDuplique'])) ? 'border-red-400' : 'border-gray-300' ?> rounded-md text-sm focus:ring-1 focus:ring-indigo-500 focus:outline-none"
                >
                <?php if(isset($errors['telephoneVide'])): ?>
                    <p class="mt-1 text-xs text-red-600"><?= $errors['telephoneVide'] ?></p>
                <?php endif; ?>
                <?php if(isset($errors['telephoneDuplique'])): ?>
                    <p class="mt-1 text-xs text-red-600"><?= $errors['telephoneDuplique'] ?></p>
                <?php endif; ?>
            </div>

            <!-- Adresse -->
            <div class="col-span-1">
                <label class="block text-xs font-medium text-gray-700 uppercase mb-1">Adresse</label>
                <input
                    type="text"
                    name="adresse"
                    value="<?= htmlspecialchars($client['adresse'] ?? $old['adresse'] ?? '') ?>"
                    class="mt-1 block w-full px-3 py-2 border <?= isset($errors['adresse']) ? 'border-red-400' : 'border-gray-300' ?> rounded-md text-sm focus:ring-1 focus:ring-indigo-500 focus:outline-none"
                >
                <?php if(isset($errors['adresse'])): ?>
                    <p class="mt-1 text-xs text-red-600"><?= $errors['adresse'] ?></p>
                <?php endif; ?>
            </div>

            <div class="col-span-2 pt-4">
                <?php if(isset($client) && !empty($client) && isset($client['id_client'])): ?>
                    <button
                        name="update-client"
                        type="submit"
                        class="w-full bg-amber-600 hover:bg-amber-700 text-white py-2.5 px-4 rounded-md font-semibold text-sm transition cursor-pointer shadow-sm"
                    >
                        Confirmer la modification
                    </button>
                <?php else: ?>
                    <button
                        name="add-client"
                        type="submit"
                        class="w-full bg-indigo-600 hover:bg-indigo-700 text-white py-2.5 px-4 rounded-md font-semibold text-sm transition cursor-pointer shadow-sm"
                    >
                        Enregistrer le client
                    </button>
                <?php endif; ?>
            </div>

        </form>
    </div>
</div>