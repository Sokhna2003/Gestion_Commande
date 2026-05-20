<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style type="text/tailwindcss">
        @theme {
        --color-clifford: #da373d;
      }
    </style>
</head>

<body>
    <!-- MAIN CONTENT AREA -->
    <main class="flex-1 overflow-y-auto p-6 bg-gray-50">
        <div class="max-w-5xl mx-auto space-y-6">
            <h2 class="text-2xl font-bold text-gray-800 border-b pb-3">Ajout Commande</h2>

            <form action="<?= WEBROOT ?>?controller=commande&action=new" method="POST">

                <!--  CLIENT -->
                <section class="bg-white p-5 rounded-lg shadow-xs border border-gray-200 mb-6">
                    <h3 class="text-sm font-semibold uppercase tracking-wider text-indigo-700 mb-4">Informations Client</h3>
                    <?php if(isset($_SESSION['error_client'])): ?>
                    <p class="text-red-500 text-xs mb-2">
                        <?= $_SESSION['error_client']; unset($_SESSION['error_client']); ?>
                    </p>
                    <?php endif; ?>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 items-end">
                        <div>
                            <label class="block text-xs font-medium text-gray-700 uppercase mb-1">Téléphone</label>
                            <div class="flex gap-2">
                                <input type="tel" name="tel_client"
                                    value="<?= isset($client) ? ($_SESSION['client_commande']['telephone'] ?? $_POST['tel_client'] ?? '') : '' ?>"
                                    placeholder="Ex: 77XXXXXXX"
                                    class="flex-1 px-3 py-2 border border-gray-300 rounded-md text-sm">
                                <button type="submit" name="btn_rechercher_client"
                                    class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-md font-medium text-sm">OK</button>
                            </div>
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-gray-500 uppercase mb-1">Nom</label>
                            <input type="text" readonly
                                value="<?= isset($client) ? ($client['nom']) : '' ?>"
                                placeholder="Généré automatiquement"
                                class="w-full px-3 py-2 bg-gray-100 border border-gray-200 text-gray-500 rounded-md text-sm cursor-not-allowed">
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-gray-500 uppercase mb-1">Prénom</label>
                            <input type="text" readonly
                                value="<?= isset($client) ? ($client['prenom']) : '' ?>"
                                placeholder="Généré automatiquement"
                                class="w-full px-3 py-2 bg-gray-100 border border-gray-200 text-gray-500 rounded-md text-sm cursor-not-allowed">
                        </div>
                    </div>
                </section>

                <!-- SECTION 2 : PRODUIT -->
                <section class="bg-white p-5 rounded-lg shadow-xs border border-gray-200 mb-6">
                    <h3 class="text-sm font-semibold uppercase tracking-wider text-indigo-700 mb-4">Sélection Produit
                    </h3>
                    <?php if(isset($_SESSION['error_produit'])): ?>
                    <p class="text-red-500 text-xs mb-2">
                        <?= $_SESSION['error_produit']; unset($_SESSION['error_produit']); ?>
                    </p>
                    <?php endif; ?>
                    <?php if(isset($_SESSION['error_stock'])): ?>
                    <p class="text-red-500 text-xs mb-2">
                        <?= $_SESSION['error_stock']; unset($_SESSION['error_stock']); ?>
                    </p>
                    <?php endif; ?>

                    <div class="space-y-4">
                        <div class="max-w-xs">
                            <label class="block text-xs font-medium text-gray-700 uppercase mb-1">Référence
                                Produit</label>
                            <div class="flex gap-2">
                                <input type="text" name="ref_produit"
                                    value="<?= isset($produit_trouve) ? ($produit_trouve['reference']) : '' ?>"
                                    placeholder="Ex: REF-001"
                                    class="flex-1 px-3 py-2 border border-gray-300 rounded-md text-sm">
                                <button type="submit" name="btn_rechercher_product"
                                    class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-md font-medium text-sm">OK</button>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 items-center">
                            <div>
                                <label class="block text-xs font-medium text-gray-500 uppercase mb-1">Libellé</label>
                                <input type="text" readonly
                                    value="<?= isset($produit_trouve) ? ($produit_trouve['libelle']) : '' ?>"
                                    placeholder="Produit recherché"
                                    class="w-full px-3 py-2 bg-gray-100 border border-gray-200 text-gray-500 rounded-md text-sm cursor-not-allowed">
                            </div>
                            <div>
                                <label class="block text-xs font-medium text-gray-500 uppercase mb-1">Prix</label>
                                <input type="text" readonly
                                    value="<?= isset($produit_trouve) ? ($produit_trouve['prix'])." F
                                    CFA" : '' ?>" placeholder="0.00 F CFA" class="w-full px-3 py-2 bg-gray-100 border
                                border-gray-200 text-gray-500 rounded-md text-sm cursor-not-allowed font-semibold">
                            </div>
                            <div>
                                <label class="block text-xs font-medium text-gray-500 uppercase mb-1">Quantité en
                                    Stock</label>
                                <div class="flex items-center gap-2">
                                    <input type="text" readonly
                                        value="<?= isset($produit_trouve) ? ($produit_trouve['stock']) : '0' ?>"
                                        class="w-24 px-3 py-2 bg-gray-100 border border-gray-200 text-gray-500 rounded-md text-sm cursor-not-allowed text-center font-bold">
                                </div>
                            </div>
                        </div>

                        <?php if (isset($produit_trouve)): ?>
                        <div class="pt-2 border-t border-gray-100 max-w-xs">
                            <label class="block text-xs font-medium text-gray-700 uppercase mb-1">Quantité à
                                commander</label>
                            <div class="flex gap-2">
                                <input type="number" name="qte_commande" min="1" max="<?= $produit_trouve['stock'] ?>"
                                    value="1"
                                    class="flex-1 px-3 py-2 border border-gray-300 rounded-md text-sm text-center font-semibold">
                                <button type="submit" name="btn_ajouter_panier"
                                    class="bg-emerald-600 hover:bg-emerald-700 text-white px-4 py-2 rounded-md font-medium text-sm">Ajouter
                                    au panier</button>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                </section>
            </form>

            <!--  PANIER (FORMULAIRE DE SUPPRESSION ET D'ENREGISTREMENT) -->
            <section class="bg-white rounded-lg shadow-md border border-gray-200 overflow-hidden">
                <div class="p-4 bg-gray-50 border-b border-gray-200">
                    <h3 class="text-sm font-semibold uppercase tracking-wider text-indigo-700">Mon Panier</h3>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full leading-normal">
                        <thead>
                            <tr class="bg-gray-100 border-b border-gray-200">
                                <th
                                    class="px-5 py-3 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">
                                    Ref Prod</th>
                                <th
                                    class="px-5 py-3 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">
                                    Libellé</th>
                                <th
                                    class="px-5 py-3 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">
                                    Prix Unit</th>
                                <th
                                    class="px-5 py-3 text-center text-xs font-bold text-gray-600 uppercase tracking-wider">
                                    Qté</th>
                                <th
                                    class="px-5 py-3 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">
                                    Total</th>
                                <th
                                    class="px-5 py-3 text-right text-xs font-bold text-gray-600 uppercase tracking-wider">
                                    Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            <?php 
                        $total_panier = 0;
                        if (!empty($panier)): 
                            foreach($panier as $id_p => $item): 
                                $sous_total = $item['prix'] * $item['quantite'];
                                $total_panier += $sous_total;
                        ?>
                            <tr class="hover:bg-gray-50/50">
                                <td class="px-5 py-3 text-sm text-gray-500">
                                    <?= ($item['reference']) ?>
                                </td>
                                <td class="px-5 py-3 text-sm text-gray-800 font-medium">
                                    <?= ($item['libelle']) ?>
                                </td>
                                <td class="px-5 py-3 text-sm text-gray-600">
                                    <?= number_format($item['prix'], 2, ',', ' ') ?> F
                                </td>
                                <td class="px-5 py-3 text-sm text-center text-gray-700 font-medium">
                                    <?= $item['quantite'] ?>
                                </td>
                                <td class="px-5 py-3 text-sm text-gray-950 font-bold">
                                    <?= number_format($sous_total, 2, ',', ' ') ?> F
                                </td>
                                <td class="px-5 py-3 text-sm text-right">
                                    <form action="<?= WEBROOT ?>?controller=commande&action=new" method="POST"
                                        class="inline">
                                        <input type="hidden" name="id_produit_retirer" value="<?= $id_p ?>">
                                        <button type="submit" name="btn_retirer_produit"
                                            class="text-red-600 hover:text-red-900 text-xs border border-red-200 bg-red-50 px-2.5 py-1 rounded">Retirer</button>
                                    </form>
                                </td>
                            </tr>
                            <?php 
                            endforeach; 
                        else: 
                        ?>
                            <tr>
                                <td colspan="6" class="px-5 py-4 text-center text-sm text-gray-400">Le panier est vide
                                </td>
                            </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>

                <!-- ENREGISTREMENT DE LA COMMANDE FINALE -->
                <form action="<?= WEBROOT ?>?controller=commande&action=save" method="POST">
                    <div
                        class="p-5 bg-gray-50 border-t border-gray-200 flex flex-col sm:flex-row justify-between items-center gap-4">
                        <div class="text-lg font-bold text-gray-800">
                            Total panier : <span class="text-indigo-700 text-xl font-black">
                                <?= number_format($total_panier, 2, ',', ' ') ?> F
                            </span>
                        </div>
                        <?php if (!empty($panier) && isset($client)): ?>
                        <button type="submit"
                            class="w-full sm:w-auto bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-2.5 rounded-md font-semibold text-sm shadow-md transition">
                            Enregistrer la commande
                        </button>
                        <?php else: ?>
                        <button type="button" disabled
                            class="w-full sm:w-auto bg-gray-300 text-gray-500 px-6 py-2.5 rounded-md font-semibold text-sm cursor-not-allowed">
                            Associer un client et un produit
                        </button>
                        <?php endif; ?>
                    </div>
                </form>
            </section>
        </div>
    </main>

</body>

</html>