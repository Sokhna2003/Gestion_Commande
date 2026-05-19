
        <!-- MAIN CONTENT -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- HEADER -->
            <header class="flex items-center justify-between px-6 py-4 bg-white border-b">
                <h1 class="text-xl font-semibold text-gray-800">Liste des Commandes</h1>
                <div class="flex items-center">
                    <a href="<?= WEBROOT ?>?controller=client&action=new">
                    <button class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 transition">
                        + Nouveau Commande
                    </button>
                    </a>
                </div>
            </header>

            <!-- TABLEAU COMMANDES -->
            <main class="flex-1 overflow-x-hidden overflow-y-auto p-6">
                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <table class="min-w-full leading-normal">
                        <thead>
                            <tr class="bg-gray-50 border-b border-gray-200">
                                <th class="px-5 py-3 text-left text-xs font-semibold text-gray-600 uppercase">DESCRIPTION</th>
                                <th class="px-5 py-3 text-left text-xs font-semibold text-gray-600 uppercase">DATE_COMMANDE</th>
                                <th class="px-5 py-3 text-left text-xs font-semibold text-gray-600 uppercase">MONTANT_TOTAL</th>
                                <th class="px-5 py-3 text-left text-xs font-semibold text-gray-600 uppercase">STATUT</th>
                                <th class="px-5 py-3 text-left text-xs font-semibold text-gray-600 uppercase">CLIENT</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($commandes as $commande):?>
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-5 py-5 border-b border-gray-200 text-sm"><?= $commande["description"] ?></td>
                                <td class="px-5 py-5 border-b border-gray-200 text-sm"><?= $commande["date_commande"] ?></td>
                                <td class="px-5 py-5 border-b border-gray-200 text-sm"><?= $commande["montant_total"] ?></td>
                                <td class="px-5 py-5 border-b border-gray-200 text-sm"><?= $commande["statut"] ?></td>
                                <td class="px-5 py-5 border-b border-gray-200 text-sm"><?= $commande["id_client"] ?></td>
                                <!-- <td class="px-5 py-5 border-b border-gray-200 text-sm">
                                    <a href="<?= WEBROOT ?>?controller=commande&action=modifier&id=<?= $commande['id_commande'] ?>">
                                        <button class="text-blue-600 hover:text-blue-900 mr-3">
                                            Modifier
                                        </button>
                                    </a>
                                    <a href="<?= WEBROOT ?>?controller=commande&action=supprimer=<?= $c['id_commande'] ?>"><button class="text-red-600 hover:text-red-900">Supprimer</button></a>
                                </td> -->
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>

