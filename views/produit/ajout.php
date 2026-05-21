<header class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8 mt-8 mb-6">
    <h2 class="text-2xl sm:text-3xl font-bold text-gray-900">
        <?= isset($produit) && !empty($produit) && isset($produit['id_produit']) ? "Modifier le produit" : "Ajouter un nouveau produit" ?>
    </h2>
    <p class="mt-1 text-sm text-gray-500">
        <?= isset($produit) && !empty($produit) && isset($produit['id_produit']) ? "Modifiez les informations du produit ci-dessous" : "Remplissez le formulaire pour ajouter un produit" ?>
    </p>
</header>

<div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8 mb-12">
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">

        <form method="POST" class="grid grid-cols-2 gap-4">

            <!-- Référence -->
            <div class="col-span-1">
                <label class="block text-xs font-medium text-gray-700 uppercase mb-1">Référence</label>
                <input
                    type="text"
                    name="reference"
                    value="<?= htmlspecialchars($produit['reference'] ?? $old['reference'] ?? '') ?>"
                    class="mt-1 block w-full px-3 py-2 border <?= isset($errors['referenceVide']) ? 'border-red-400' : 'border-gray-300' ?> rounded-md text-sm focus:ring-1 focus:ring-indigo-500 focus:outline-none"
                >
                <?php if(isset($errors['referenceVide'])): ?>
                    <p class="mt-1 text-xs text-red-600"><?= $errors['referenceVide'] ?></p>
                <?php endif; ?>
            </div>

            <!-- Libellé -->
            <div class="col-span-1">
                <label class="block text-xs font-medium text-gray-700 uppercase mb-1">Libellé</label>
                <input
                    type="text"
                    name="libelle"
                    value="<?= htmlspecialchars($produit['libelle'] ?? $old['libelle'] ?? '') ?>"
                    class="mt-1 block w-full px-3 py-2 border <?= isset($errors['libelleVide']) ? 'border-red-400' : 'border-gray-300' ?> rounded-md text-sm focus:ring-1 focus:ring-indigo-500 focus:outline-none"
                >
                <?php if(isset($errors['libelleVide'])): ?>
                    <p class="mt-1 text-xs text-red-600"><?= $errors['libelleVide'] ?></p>
                <?php endif; ?>
            </div>

            <!-- Prix -->
            <div class="col-span-1">
                <label class="block text-xs font-medium text-gray-700 uppercase mb-1">Prix (F CFA)</label>
                <input
                    type="number"
                    step="0.01"
                    name="prix"
                    value="<?= htmlspecialchars($produit['prix'] ?? $old['prix'] ?? '') ?>"
                    class="mt-1 block w-full px-3 py-2 border <?= isset($errors['prixVide']) ? 'border-red-400' : 'border-gray-300' ?> rounded-md text-sm focus:ring-1 focus:ring-indigo-500 focus:outline-none"
                >
                <?php if(isset($errors['prixVide'])): ?>
                    <p class="mt-1 text-xs text-red-600"><?= $errors['prixVide'] ?></p>
                <?php endif; ?>
            </div>

            <!-- Stock -->
            <div class="col-span-1">
                <label class="block text-xs font-medium text-gray-700 uppercase mb-1">Stock Initial</label>
                <input
                    type="number"
                    name="stock"
                    value="<?= htmlspecialchars($produit['stock'] ?? $old['stock'] ?? '') ?>"
                    class="mt-1 block w-full px-3 py-2 border <?= isset($errors['stockVide']) ? 'border-red-400' : 'border-gray-300' ?> rounded-md text-sm focus:ring-1 focus:ring-indigo-500 focus:outline-none"
                >
                <?php if(isset($errors['stockVide'])): ?>
                    <p class="mt-1 text-xs text-red-600"><?= $errors['stockVide'] ?></p>
                <?php endif; ?>
            </div>

            <!-- Description -->
            <div class="col-span-2">
                <label class="block text-xs font-medium text-gray-700 uppercase mb-1">Description</label>
                <textarea
                    name="description"
                    rows="3"
                    class="mt-1 block w-full px-3 py-2 border <?= isset($errors['descriptionVide']) ? 'border-red-400' : 'border-gray-300' ?> rounded-md text-sm focus:ring-1 focus:ring-indigo-500 focus:outline-none"
                ><?= htmlspecialchars($produit['description'] ?? $old['description'] ?? '') ?></textarea>
                <?php if(isset($errors['descriptionVide'])): ?>
                    <p class="mt-1 text-xs text-red-600"><?= $errors['descriptionVide'] ?></p>
                <?php endif; ?>
            </div>

            <div class="col-span-2 pt-4">
                <?php if(isset($produit) && !empty($produit) && isset($produit['id_produit'])): ?>
                    <button
                        name="update-produit"
                        type="submit"
                        class="w-full bg-amber-600 hover:bg-amber-700 text-white py-2.5 px-4 rounded-md font-semibold text-sm transition cursor-pointer shadow-sm"
                    >
                        Confirmer la modification
                    </button>
                <?php else: ?>
                    <button
                        name="add-produit"
                        type="submit"
                        class="w-full bg-indigo-600 hover:bg-indigo-700 text-white py-2.5 px-4 rounded-md font-semibold text-sm transition cursor-pointer shadow-sm"
                    >
                        Enregistrer le produit
                    </button>
                <?php endif; ?>
            </div>

        </form>
    </div>
</div>