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

    <form method="POST" class="grid grid-cols-2 gap-4">

    
        <div class="col-span-1">
            <label class="block text-sm font-medium text-gray-700">
                libelle
            </label>

            <input
                type="text"
                name="libelle"
                required
                value="<?= $produit['libelle'] ?? '' ?>"
                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2"
            >
        </div>

        
        <div class="col-span-1">
            <label class="block text-sm font-medium text-gray-700">
                prix
            </label>

            <input
                type="text"
                name="prix"
                required
                value="<?= $produit['prix'] ?? '' ?>"
                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2"
            >
        </div>

        
        <div class="col-span-2">
            <label class="block text-sm font-medium text-gray-700">
                stock
            </label>

            <input
                type="text"
                name="stock"
                required
                value="<?= $produit['stock'] ?? '' ?>"
                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2"
            >
        </div>

        
        <div class="col-span-1">
            <label class="block text-sm font-medium text-gray-700">
                description
            </label>

            <input
            
                type="text"
                name="description"
                required
                value="<?= $produit['description'] ?? '' ?>"
                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2"
            >
        </div>

            <?php if(isset($produit)): ?>

                <button
                    name="update-produit"
                    type="submit"
                    class="w-full bg-yellow-600 text-white py-2 px-4 rounded-md hover:bg-yellow-700 transition font-semibold"
                >
                    Modifier le produit
                </button>

            <?php else: ?>

                <button
                    name="add-produit"
                    type="submit"
                    class="w-full bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-700 transition font-semibold"
                >
                    Enregistrer le produit
                </button>

            <?php endif; ?>

        </div>

    </form>
</div>

</body>
</html>