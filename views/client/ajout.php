<div class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-md mt-10">

    <h2 class="text-2xl font-bold text-gray-800 mb-6 border-b pb-2">

        <?= isset($client) ? "Modifier le client" : "Ajouter un nouveau client" ?>

    </h2>

    <?php if(!empty($errors ?? [])): ?>
        <div class="mb-4 p-4 bg-red-50 border border-red-200 rounded-md">
            <ul class="list-disc list-inside text-sm text-red-600 space-y-1">
                <?php foreach($errors as $error): ?>
                    <li><?= htmlspecialchars($error) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form method="POST" class="grid grid-cols-2 gap-4">

        <!-- Prénom -->
        <div class="col-span-1">
            <label class="block text-sm font-medium text-gray-700">
                Prénom
            </label>

            <input
                type="text"
                name="prenom"
                required
                value="<?= $client['prenom'] ?? '' ?>"
                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2"
            >
        </div>

        <!-- Nom -->
        <div class="col-span-1">
            <label class="block text-sm font-medium text-gray-700">
                Nom
            </label>

            <input
                type="text"
                name="nom"
                required
                value="<?= $client['nom'] ?? '' ?>"
                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2"
            >
        </div>

        <!-- Email -->
        <div class="col-span-2">
            <label class="block text-sm font-medium text-gray-700">
                Email
            </label>

            <input
                type="email"
                name="email"
                required
                value="<?= $client['email'] ?? '' ?>"
                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2"
            >
        </div>

        <!-- Téléphone -->
        <div class="col-span-1">
            <label class="block text-sm font-medium text-gray-700">
                Téléphone
            </label>

            <input
                type="text"
                name="telephone"
                required
                value="<?= $client['telephone'] ?? '' ?>"
                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2"
            >
        </div>

        <!-- Adresse -->
        <div class="col-span-1">
            <label class="block text-sm font-medium text-gray-700">
                Adresse
            </label>

            <input
                type="text"
                name="adresse"
                required
                value="<?= $client['adresse'] ?? '' ?>"
                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2"
            >
        </div>

        <div class="col-span-2 mt-4">

            <?php if(isset($client)): ?>

                <button
                    name="update-client"
                    type="submit"
                    class="w-full bg-yellow-600 text-white py-2 px-4 rounded-md hover:bg-yellow-700 transition font-semibold"
                >
                    Modifier le client
                </button>

            <?php else: ?>

                <button
                    name="add-client"
                    type="submit"
                    class="w-full bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-700 transition font-semibold"
                >
                    Enregistrer le client
                </button>

            <?php endif; ?>

        </div>

    </form>
</div>
