<!-- En-tête -->
<header class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-8 flex flex-col sm:flex-row sm:items-center sm:justify-between">
    <div>
        <h2 class="text-2xl sm:text-3xl font-bold text-gray-900">
            <?= hasRole('ADMIN') ? "Commandes" : "Mes Commandes" ?>
        </h2>
        <p class="mt-1 text-sm text-gray-500">
            <?= hasRole('ADMIN') ? "Gérer toutes les commandes de vos clients." : "Consultez l'historique de vos achats." ?>
        </p>
    </div>
    <?php if (hasRole('ADMIN')): ?>
        <a href="<?=path("commande","ajout")?>" class="mt-4 sm:mt-0 inline-flex items-center px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-lg hover:bg-indigo-700 transition shadow-sm">
            + Nouvelle commande
        </a>
    <?php endif; ?>
</header>

<!-- Tableau des commandes -->
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-6 mb-12">
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Description</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Date commande</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Montant total</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Statut</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Client</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <?php foreach ($commandes as $commande): ?>
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 text-sm text-gray-600 max-w-xs truncate">
                            <?=$commande["description"] ?? "Pas de description"?>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                            <?=$commande["date_commande"]?>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                            <?=$commande["montant_total"]?>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                            <?=$commande["statut"]?>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                            <?=$commande["prenom"] . " " . $commande["nom"]?>
                        </td>
                    </tr>
                    <?php endforeach; ?>

                    <?php if(empty($commandes)): ?>
                    <tr>
                        <td colspan="5" class="px-6 py-12 text-center text-gray-500">
                            <!-- Message adapté selon le rôle -->
                            <?= hasRole('ADMIN') ? "Aucune commande trouvée." : "Vous n'avez pas encore passé de commande." ?>
                            
                            <?php if (hasRole('ADMIN')): ?>
                                <a href="<?=path("commande","ajout")?>" class="text-indigo-600 hover:underline">
                                    Créez la première commande
                                </a>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <div class="p-4 text-sm text-gray-500 text-center border-t border-gray-100">
            <?=$total_commandes?> commande(s) au total
        </div>
    </div>
</section>