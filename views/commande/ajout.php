<header class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 mt-8 mb-6">
    <h2 class="text-2xl sm:text-3xl font-bold text-gray-900">Nouvelle Commande</h2>
    <p class="mt-1 text-sm text-gray-500">Suivez les étapes pour enregistrer une commande.</p>
</header>

<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6 mb-12">

    <!-- ═══════════════════════════════════════════════
         SECTION 1 : CLIENT
    ═══════════════════════════════════════════════ -->
    <section class="bg-white p-5 rounded-xl shadow-sm border border-gray-200">
        <h3 class="text-sm font-semibold uppercase tracking-wider text-indigo-700 mb-4">1. Client</h3>

        <form method="POST" action="<?= path('commande', 'rechercherClient') ?>">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 items-end">
                <!-- Téléphone -->
                <div>
                    <label class="block text-xs font-medium text-gray-700 uppercase mb-1">Téléphone</label>
                    <div class="flex gap-2">
                        <input type="text" name="tel_client"
                            value="<?= htmlspecialchars($client["telephone"] ?? $_POST["tel_client"] ?? "") ?>"
                            placeholder="Ex: 771234567"
                            class="flex-1 px-3 py-2 border <?= $erreur_client ? 'border-red-400' : 'border-gray-300' ?> rounded-md text-sm focus:ring-1 focus:ring-indigo-500 focus:outline-none">
                        <button type="submit"
                            class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-md font-medium text-sm transition cursor-pointer">
                            OK
                        </button>
                    </div>
                    <?php if($erreur_client): ?>
                        <p class="mt-1 text-xs text-red-600"><?= htmlspecialchars($erreur_client) ?></p>
                    <?php endif; ?>
                    <?php if($client): ?>
                        <p class="mt-1 text-xs text-emerald-600">✓ Client trouvé</p>
                    <?php endif; ?>
                </div>

                <!-- Nom -->
                <div>
                    <label class="block text-xs font-medium text-gray-500 uppercase mb-1">Nom</label>
                    <input type="text" readonly
                        value="<?= htmlspecialchars($client["nom"] ?? "") ?>"
                        placeholder="Généré automatiquement"
                        class="w-full px-3 py-2 bg-gray-100 border border-gray-200 text-gray-700 rounded-md text-sm cursor-not-allowed font-medium">
                </div>

                <!-- Prénom -->
                <div>
                    <label class="block text-xs font-medium text-gray-500 uppercase mb-1">Prénom</label>
                    <input type="text" readonly
                        value="<?= htmlspecialchars($client["prenom"] ?? "") ?>"
                        placeholder="Généré automatiquement"
                        class="w-full px-3 py-2 bg-gray-100 border border-gray-200 text-gray-700 rounded-md text-sm cursor-not-allowed font-medium">
                </div>
            </div>
        </form>
    </section>

    <!-- ═══════════════════════════════════════════════
         SECTION 2 : PRODUIT (désactivée si pas de client)
    ═══════════════════════════════════════════════ -->
    <section class="bg-white p-5 rounded-xl shadow-sm border border-gray-200 <?= !$client ? 'opacity-50 pointer-events-none' : '' ?>">
        <h3 class="text-sm font-semibold uppercase tracking-wider text-indigo-700 mb-4">2. Produit</h3>

        <form method="POST" action="<?= path('commande', 'rechercherProduit') ?>">
            <div class="space-y-4">
                <!-- Référence -->
                <div class="max-w-xs">
                    <label class="block text-xs font-medium text-gray-700 uppercase mb-1">Référence Produit</label>
                    <div class="flex gap-2">
                        <input type="text" name="ref_produit"
                            value="<?= htmlspecialchars($produit["reference"] ?? "") ?>"
                            placeholder="Ex: REF-001"
                            class="flex-1 px-3 py-2 border <?= $erreur_produit ? 'border-red-400' : 'border-gray-300' ?> rounded-md text-sm focus:ring-1 focus:ring-indigo-500 focus:outline-none">
                        <button type="submit"
                            class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-md font-medium text-sm transition cursor-pointer">
                            OK
                        </button>
                    </div>
                    <?php if($erreur_produit): ?>
                        <p class="mt-1 text-xs text-red-600"><?= htmlspecialchars($erreur_produit) ?></p>
                    <?php endif; ?>
                    <?php if($produit): ?>
                        <p class="mt-1 text-xs text-emerald-600">✓ Produit trouvé</p>
                    <?php endif; ?>
                </div>

                <!-- Infos produit -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 items-center">
                    <div>
                        <label class="block text-xs font-medium text-gray-500 uppercase mb-1">Libellé</label>
                        <input type="text" readonly
                            value="<?= htmlspecialchars($produit["libelle"] ?? "") ?>"
                            placeholder="Produit recherché"
                            class="w-full px-3 py-2 bg-gray-100 border border-gray-200 text-gray-500 rounded-md text-sm cursor-not-allowed">
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-gray-500 uppercase mb-1">Prix</label>
                        <input type="text" readonly
                            value="<?= $produit ? number_format($produit["prix"], 0, ',', ' ') . ' F CFA' : '' ?>"
                            placeholder="0 F CFA"
                            class="w-full px-3 py-2 bg-gray-100 border border-gray-200 text-gray-500 rounded-md text-sm cursor-not-allowed font-semibold">
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-gray-500 uppercase mb-1">Stock disponible</label>
                        <div class="flex items-center gap-2">
                            <input type="text" readonly
                                value="<?= htmlspecialchars($produit["stock"] ?? "") ?>"
                                placeholder="0"
                                class="w-24 px-3 py-2 bg-gray-100 border border-gray-200 text-gray-500 rounded-md text-sm cursor-not-allowed text-center font-bold">
                            <?php if($produit): ?>
                                <?php
                                    // Calculer le stock restant (déduire ce qui est déjà dans le panier)
                                    $qteDejaAuPanier = 0;
                                    foreach($panier as $item){
                                        if($item["id_produit"] == $produit["id_produit"]){
                                            $qteDejaAuPanier = $item["quantite"];
                                            break;
                                        }
                                    }
                                    $stockRestant = $produit["stock"] - $qteDejaAuPanier;
                                ?>
                                <span class="text-xs font-bold <?= $stockRestant > 0 ? 'text-emerald-600 bg-emerald-50 border-emerald-200' : 'text-red-600 bg-red-50 border-red-200' ?> px-2.5 py-1 rounded border">
                                    Dispo : <?= $stockRestant ?>
                                </span>
                            <?php else: ?>
                                <span class="text-xs font-bold text-gray-400 bg-gray-50 border-gray-200 px-2.5 py-1 rounded border">
                                    Dispo : -
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <!-- Formulaire ajout au panier (séparé) -->
        <?php if($produit): ?>
        <form method="POST" action="<?= path('commande', 'ajouterAuPanier') ?>" class="pt-4 border-t border-gray-100 mt-4">
            <div class="max-w-xs">
                <label class="block text-xs font-medium text-gray-700 uppercase mb-1">Quantité à commander</label>
                <div class="flex gap-2">
                    <input type="text" name="qte_commande" value="1"
                        class="flex-1 px-3 py-2 border <?= $erreur_qte ? 'border-red-400' : 'border-gray-300' ?> rounded-md text-sm text-center font-semibold focus:ring-1 focus:ring-indigo-500 focus:outline-none">
                    <button type="submit"
                        class="bg-emerald-600 hover:bg-emerald-700 text-white px-4 py-2 rounded-md font-medium text-sm transition whitespace-nowrap cursor-pointer">
                        Ajouter au panier
                    </button>
                </div>
                <?php if($erreur_qte): ?>
                    <p class="mt-1 text-xs text-red-600"><?= htmlspecialchars($erreur_qte) ?></p>
                <?php endif; ?>
            </div>
        </form>
        <?php endif; ?>
    </section>

    <!-- ═══════════════════════════════════════════════
         SECTION 3 : PANIER (désactivée si pas de client)
    ═══════════════════════════════════════════════ -->
    <section class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden <?= !$client ? 'opacity-50 pointer-events-none' : '' ?>">
        <div class="p-4 bg-gray-50 border-b border-gray-200">
            <h3 class="text-sm font-semibold uppercase tracking-wider text-indigo-700">3. Mon Panier</h3>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full leading-normal">
                <thead>
                    <tr class="bg-gray-100 border-b border-gray-200">
                        <th class="px-5 py-3 text-left text-xs font-bold text-gray-600 uppercase">Référence</th>
                        <th class="px-5 py-3 text-left text-xs font-bold text-gray-600 uppercase">Libellé</th>
                        <th class="px-5 py-3 text-left text-xs font-bold text-gray-600 uppercase">Prix Unit.</th>
                        <th class="px-5 py-3 text-center text-xs font-bold text-gray-600 uppercase">Qté</th>
                        <th class="px-5 py-3 text-left text-xs font-bold text-gray-600 uppercase">Total</th>
                        <th class="px-5 py-3 text-right text-xs font-bold text-gray-600 uppercase">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <?php if(empty($panier)): ?>
                        <tr>
                            <td colspan="6" class="px-5 py-10 text-center text-gray-400 text-sm">
                                Le panier est vide. Ajoutez des produits ci-dessus.
                            </td>
                        </tr>
                    <?php else: ?>
                        <?php foreach($panier as $index => $item): ?>
                        <tr class="hover:bg-gray-50">
                            <td class="px-5 py-3 text-sm text-gray-500"><?= htmlspecialchars($item["reference"]) ?></td>
                            <td class="px-5 py-3 text-sm text-gray-800 font-medium"><?= htmlspecialchars($item["libelle"]) ?></td>
                            <td class="px-5 py-3 text-sm text-gray-600"><?= number_format($item["prix"], 0, ',', ' ') ?> F CFA</td>
                            <td class="px-5 py-3 text-sm text-center text-gray-700 font-medium"><?= $item["quantite"] ?></td>
                            <td class="px-5 py-3 text-sm text-gray-900 font-bold"><?= number_format($item["prix"] * $item["quantite"], 0, ',', ' ') ?> F CFA</td>
                            <td class="px-5 py-3 text-sm text-right">
                                <form method="POST" action="<?= path('commande', 'retirerDuPanier') ?>">
                                    <input type="hidden" name="index" value="<?= $index ?>">
                                    <button type="submit"
                                        class="text-red-600 hover:text-red-900 font-semibold text-xs border border-red-200 bg-red-50 hover:bg-red-100 px-2.5 py-1 rounded transition cursor-pointer">
                                        Retirer
                                    </button>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <!-- Footer panier -->
        <form method="POST" action="<?= path('commande', 'enregistrer') ?>">
            <div class="p-5 bg-gray-50 border-t border-gray-200 flex flex-col sm:flex-row justify-between items-center gap-4">
                <div>
                    <label class="block text-xs font-medium text-gray-500 uppercase mb-1">Description (optionnel)</label>
                    <input type="text" name="description" placeholder="Ex: Commande urgente..."
                        class="px-3 py-2 border border-gray-300 rounded-md text-sm focus:ring-1 focus:ring-indigo-500 focus:outline-none w-64">
                </div>
                <div class="flex flex-col items-end gap-3">
                    <div class="text-lg font-bold text-gray-800">
                        Total : <span class="text-indigo-700 text-xl font-black">
                            <?= number_format($total, 0, ',', ' ') ?> F CFA
                        </span>
                    </div>
                    <button type="submit"
                        <?= empty($panier) ? 'disabled' : '' ?>
                        class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-2.5 rounded-md font-semibold text-sm shadow-md transition cursor-pointer disabled:opacity-40 disabled:cursor-not-allowed">
                        Enregistrer la commande
                    </button>
                </div>
            </div>
        </form>
    </section>

</div>