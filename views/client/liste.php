<!-- En-tête -->
<header class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-8 flex flex-col sm:flex-row sm:items-center sm:justify-between">
    <div>
        <h2 class="text-2xl sm:text-3xl font-bold text-gray-900">Clients</h2>
        <p class="mt-1 text-sm text-gray-500">Gérez tous les clients de votre boutique.</p>
    </div>
    <a href="<?=path("client","ajout")?>" class="mt-4 sm:mt-0 inline-flex items-center px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-lg hover:bg-indigo-700 transition shadow-sm">
        + Nouveau client
    </a>
</header>

<!-- Affichage message d'erreur si suppression impossible -->
<?php if(isset($_SESSION["error_message"])): ?>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4">
        <div class="bg-red-50 border border-red-200 rounded-md p-4">
            <p class="text-sm text-red-600"><?= htmlspecialchars($_SESSION["error_message"]) ?></p>
        </div>
    </div>
    <?php unset($_SESSION["error_message"]); ?>
<?php endif; ?>

<!-- Tableau des clients -->
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-6 mb-12">
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">ID</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Client</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Téléphone</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Adresse</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <?php foreach($clients as $c): ?>
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            <?= $c["id_client"] ?>
                        </td>
                        <td class="px-6 py-4 text-sm">
                            <div class="flex flex-col">
                                <span class="font-bold text-gray-900"><?= htmlspecialchars($c["prenom"] . ' ' . $c["nom"]) ?></span>
                                <span class="text-gray-500 text-xs"><?= htmlspecialchars($c["email"]) ?></span>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                            <?= htmlspecialchars($c["telephone"]) ?>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-600 max-w-xs truncate">
                            <?= htmlspecialchars($c["adresse"]) ?>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-3">
                            <a href="<?= path("client","modifier")."&id=".$c['id_client'] ?>" class="text-indigo-600 hover:text-indigo-900">Modifier</a>
                            <a href="<?= path("client","supprimer")."&id=".$c['id_client'] ?>" class="text-red-600 hover:text-red-900" onclick="return confirm('Confirmer la suppression ?')">Supprimer</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>

                    <?php if(empty($clients)): ?>
                    <tr>
                        <td colspan="5" class="px-6 py-12 text-center text-gray-500">
                            Aucun client trouvé.
                            <a href="<?=path("client","ajout")?>" class="text-indigo-600 hover:underline">
                                Ajoutez votre premier client
                            </a>
                        </td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <div class="p-4 text-sm text-gray-500 text-center border-t border-gray-100">
            <?= $total_clients ?> client(s) au total
        </div>
    </div>
</section>