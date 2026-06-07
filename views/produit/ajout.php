<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Gestion Group Commandes</title>
</head>

<body class="bg-gray-100 font-sans">

<div class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-md mt-10">

    <h2 class="text-2xl font-bold text-gray-800 mb-6 border-b pb-2">
        <?= isset($produit) ? "Modifier le produit" : "Ajouter un nouveau produit" ?>
    </h2>
    <p class="mt-1 text-sm text-gray-500">
        <?= isset($produit) && !empty($produit) && isset($produit['id_produit']) ? "Modifiez les informations du produit ci-dessous" : "Remplissez le formulaire pour ajouter un produit" ?>
    </p>
</header>

<div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8 mb-12">
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">

    <form action="<?= isset($produit) ? path('produit', 'modifier').'&id='.$produit['id_produit'] : path('produit', 'new') ?>" method="POST" class="grid grid-cols-2 gap-4">

        <div class="col-span-1">
            <label class="block text-sm font-medium text-gray-700">Référence</label>
            <input
                type="text"
                name="reference"
                value="<?= htmlspecialchars($produit['reference'] ?? $old['reference'] ?? '') ?>"
                class="mt-1 block w-full border <?= isset($errors['referenceVide']) ? 'border-red-400 focus:outline-red-500' : 'border-gray-300' ?> rounded-md shadow-xs p-2"
            >
            <?php if(isset($errors['referenceVide'])): ?>
                <span class="text-red-500 text-xs mt-1 block font-medium"><?= $errors['referenceVide'] ?></span>
            <?php endif; ?>
        </div>

        <div class="col-span-1">
            <label class="block text-sm font-medium text-gray-700">Libellé</label>
            <input
                type="text"
                name="libelle"
                value="<?= htmlspecialchars($produit['libelle'] ?? $old['libelle'] ?? '') ?>"
                class="mt-1 block w-full border <?= isset($errors['libelleVide']) ? 'border-red-400 focus:outline-red-500' : 'border-gray-300' ?> rounded-md shadow-xs p-2"
            >
            <?php if(isset($errors['libelleVide'])): ?>
                <span class="text-red-500 text-xs mt-1 block font-medium"><?= $errors['libelleVide'] ?></span>
            <?php endif; ?>
        </div>

        <div class="col-span-1">
            <label class="block text-sm font-medium text-gray-700">Prix (F CFA)</label>
            <input
                type="number"
                step="0.01"
                name="prix"
                value="<?= htmlspecialchars($produit['prix'] ?? $old['prix'] ?? '') ?>"
                class="mt-1 block w-full border <?= isset($errors['prixVide']) ? 'border-red-400 focus:outline-red-500' : 'border-gray-300' ?> rounded-md shadow-xs p-2"
            >
            <?php if(isset($errors['prixVide'])): ?>
                <span class="text-red-500 text-xs mt-1 block font-medium"><?= $errors['prixVide'] ?></span>
            <?php endif; ?>
        </div>

        <div class="col-span-1">
            <label class="block text-sm font-medium text-gray-700">Stock Initial</label>
            <input
                type="number"
                name="stock"
                value="<?= htmlspecialchars($produit['stock'] ?? $old['stock'] ?? '') ?>"
                class="mt-1 block w-full border <?= isset($errors['stockVide']) ? 'border-red-400 focus:outline-red-500' : 'border-gray-300' ?> rounded-md shadow-xs p-2"
            >
            <?php if(isset($errors['stockVide'])): ?>
                <span class="text-red-500 text-xs mt-1 block font-medium"><?= $errors['stockVide'] ?></span>
            <?php endif; ?>
        </div>

        <div class="col-span-2">
            <label class="block text-sm font-medium text-gray-700">Description</label>
            <textarea
                name="description"
                rows="3"
                class="mt-1 block w-full border <?= isset($errors['descriptionVide']) ? 'border-red-400 focus:outline-red-500' : 'border-gray-300' ?> rounded-md shadow-xs p-2"
            ><?= htmlspecialchars($produit['description'] ?? $old['description'] ?? '') ?></textarea>
            <?php if(isset($errors['descriptionVide'])): ?>
                <span class="text-red-500 text-xs mt-1 block font-medium"><?= $errors['descriptionVide'] ?></span>
            <?php endif; ?>
        </div>

        <div class="col-span-2 pt-4">
            <?php if(isset($produit)): ?>
                <button
                    name="update-produit"
                    type="submit"
                    class="w-full bg-amber-600 text-white py-2.5 px-4 rounded-md hover:bg-amber-700 transition font-semibold text-sm cursor-pointer shadow-sm"
                >
                    Confirmer la modification
                </button>
            <?php else: ?>
                <button
                    name="add-produit"
                    type="submit"
                    class="w-full bg-indigo-600 text-white py-2.5 px-4 rounded-md hover:bg-indigo-700 transition font-semibold text-sm cursor-pointer shadow-sm"
                >
                    Enregistrer le produit
                </button>
            <?php endif; ?>
        </div>

    </form>
</div>

</body>
</html>
