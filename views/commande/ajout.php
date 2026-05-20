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
        <!-- TITRE PRINCIPAL -->
        <h2 class="text-2xl font-bold text-gray-800 border-b pb-3">Ajout Commande</h2>

        <!-- SECTION 1 : CLIENT -->
        <section class="bg-white p-5 rounded-lg shadow-xs border border-gray-200">
            <h3 class="text-sm font-semibold uppercase tracking-wider text-indigo-700 mb-4">Informations Client</h3>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 items-end">
                <!-- Téléphone + Bouton OK -->
                <div>
                    <label class="block text-xs font-medium text-gray-700 uppercase mb-1">Téléphone</label>
                    <div class="flex gap-2">
                        <input type="tel" name="tel_client" placeholder="Ex: 777777777" class="flex-1 px-3 py-2 border border-gray-300 rounded-md shadow-xs focus:ring-1 focus:ring-indigo-500 focus:outline-none text-sm">
                        <button type="button" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-md font-medium text-sm transition shadow-xs cursor-pointer">OK</button>
                    </div>
                </div>
                <!-- Nom (Lecture seule / Désactivé) -->
                <div>
                    <label class="block text-xs font-medium text-gray-500 uppercase mb-1">Nom</label>
                    <input type="text" readonly placeholder="Généré automatiquement" class="w-full px-3 py-2 bg-gray-100 border border-gray-200 text-gray-500 rounded-md text-sm cursor-not-allowed font-medium">
                </div>
                <!-- Prénom (Lecture seule / Désactivé) -->
                <div>
                    <label class="block text-xs font-medium text-gray-500 uppercase mb-1">Prénom</label>
                    <input type="text" readonly placeholder="Généré automatiquement" class="w-full px-3 py-2 bg-gray-100 border border-gray-200 text-gray-500 rounded-md text-sm cursor-not-allowed font-medium">
                </div>
            </div>
        </section>

        <!-- SECTION 2 : PRODUIT -->
        <section class="bg-white p-5 rounded-lg shadow-xs border border-gray-200">
            <h3 class="text-sm font-semibold uppercase tracking-wider text-indigo-700 mb-4">Sélection Produit</h3>
            
            <div class="space-y-4">
                <!-- Ligne de Recherche Référence -->
                <div class="max-w-xs">
                    <label class="block text-xs font-medium text-gray-700 uppercase mb-1">Référence Produit</label>
                    <div class="flex gap-2">
                        <input type="text" name="ref_produit" placeholder="Ex: REF-001" class="flex-1 px-3 py-2 border border-gray-300 rounded-md shadow-xs focus:ring-1 focus:ring-indigo-500 focus:outline-none text-sm">
                        <button type="button" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-md font-medium text-sm transition shadow-xs cursor-pointer">OK</button>
                    </div>
                </div>

                <!-- Caractéristiques du produit trouvé (Lecture seule) -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 items-center">
                    <div>
                        <label class="block text-xs font-medium text-gray-500 uppercase mb-1">Libellé</label>
                        <input type="text" readonly placeholder="Produit recherché" class="w-full px-3 py-2 bg-gray-100 border border-gray-200 text-gray-500 rounded-md text-sm cursor-not-allowed">
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-gray-500 uppercase mb-1">Prix</label>
                        <input type="text" readonly placeholder="0.00 F CFA" class="w-full px-3 py-2 bg-gray-100 border border-gray-200 text-gray-500 rounded-md text-sm cursor-not-allowed font-semibold">
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-gray-500 uppercase mb-1">Quantité en Stock</label>
                        <div class="flex items-center gap-2">
                            <input type="text" readonly placeholder="0" class="w-24 px-3 py-2 bg-gray-100 border border-gray-200 text-gray-500 rounded-md text-sm cursor-not-allowed text-center font-bold">
                            <span class="text-xs font-bold text-emerald-600 bg-emerald-50 px-2.5 py-1 rounded border border-emerald-200">Dispo : 50</span>
                        </div>
                    </div>
                </div>

                <!-- Ligne Ajout Quantité -->
                <div class="pt-2 border-t border-gray-100 max-w-xs">
                    <label class="block text-xs font-medium text-gray-700 uppercase mb-1">Quantité à commander</label>
                    <div class="flex gap-2">
                        <input type="number" name="qte_commande" min="1" value="1" class="flex-1 px-3 py-2 border border-gray-300 rounded-md shadow-xs focus:ring-1 focus:ring-indigo-500 focus:outline-none text-sm text-center font-semibold">
                        <button type="button" class="bg-emerald-600 hover:bg-emerald-700 text-white px-4 py-2 rounded-md font-medium text-sm transition shadow-xs whitespace-nowrap cursor-pointer">Ajouter au panier</button>
                    </div>
                </div>
            </div>
        </section>

        <!-- SECTION 3 : PANIER -->
        <section class="bg-white rounded-lg shadow-md border border-gray-200 overflow-hidden">
            <div class="p-4 bg-gray-50 border-b border-gray-200 flex justify-between items-center">
                <h3 class="text-sm font-semibold uppercase tracking-wider text-indigo-700">Mon Panier</h3>
            </div>
            
            <div class="overflow-x-auto">
                <table class="min-w-full leading-normal">
                    <thead>
                        <tr class="bg-gray-100 border-b border-gray-200">
                            <th class="px-5 py-3 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Ref Prod</th>
                            <th class="px-5 py-3 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Libellé</th>
                            <th class="px-5 py-3 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Prix Unit</th>
                            <th class="px-5 py-3 text-center text-xs font-bold text-gray-600 uppercase tracking-wider">Qté</th>
                            <th class="px-5 py-3 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Total</th>
                            <th class="px-5 py-3 text-right text-xs font-bold text-gray-600 uppercase tracking-wider">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <!-- Exemple Ligne 1 -->
                        <tr class="hover:bg-gray-50/50">
                            <td class="px-5 py-3 text-sm text-gray-500">REF-002</td>
                            <td class="px-5 py-3 text-sm text-gray-800 font-medium">Casque Bluetooth</td>
                            <td class="px-5 py-3 text-sm text-gray-600">150 F</td>
                            <td class="px-5 py-3 text-sm text-center text-gray-700 font-medium">3</td>
                            <td class="px-5 py-3 text-sm text-gray-950 font-bold">450 F</td>
                            <td class="px-5 py-3 text-sm text-right">
                                <button type="button" class="text-red-600 hover:text-red-900 font-semibold text-xs border border-red-200 bg-red-50 hover:bg-red-100 px-2.5 py-1 rounded transition cursor-pointer">Retirer</button>
                            </td>
                        </tr>
                        <!-- Exemple Ligne 2 -->
                        <tr class="hover:bg-gray-50/50">
                            <td class="px-5 py-3 text-sm text-gray-500">REF-003</td>
                            <td class="px-5 py-3 text-sm text-gray-800 font-medium">Clé USB 64Go</td>
                            <td class="px-5 py-3 text-sm text-gray-600">200 F</td>
                            <td class="px-5 py-3 text-sm text-center text-gray-700 font-medium">1</td>
                            <td class="px-5 py-3 text-sm text-gray-950 font-bold">200 F</td>
                            <td class="px-5 py-3 text-sm text-right">
                                <button type="button" class="text-red-600 hover:text-red-900 font-semibold text-xs border border-red-200 bg-red-50 hover:bg-red-100 px-2.5 py-1 rounded transition cursor-pointer">Retirer</button>
                            </td>
                        </tr>
                        <!-- Exemple Ligne 3 -->
                        <tr class="hover:bg-gray-50/50">
                            <td class="px-5 py-3 text-sm text-gray-500">REF-001</td>
                            <td class="px-5 py-3 text-sm text-gray-800 font-medium">Smartphone Samsung</td>
                            <td class="px-5 py-3 text-sm text-gray-600">1300 F</td>
                            <td class="px-5 py-3 text-sm text-center text-gray-700 font-medium">1</td>
                            <td class="px-5 py-3 text-sm text-gray-950 font-bold">1300 F</td>
                            <td class="px-5 py-3 text-sm text-right">
                                <button type="button" class="text-red-600 hover:text-red-900 font-semibold text-xs border border-red-200 bg-red-50 hover:bg-red-100 px-2.5 py-1 rounded transition cursor-pointer">Retirer</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- FOOTER PANIER : TOTAL ET VALIDATION -->
            <div class="p-5 bg-gray-50 border-t border-gray-200 flex flex-col sm:flex-row justify-between items-center gap-4">
                <div class="text-lg font-bold text-gray-800">
                    Total panier : <span class="text-indigo-700 text-xl font-black">1950 F</span>
                </div>
                <button name="add-commande" type="submit" class="w-full sm:w-auto bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-2.5 rounded-md font-semibold text-sm tracking-wide shadow-md hover:shadow-lg transition cursor-pointer">
                    Enregistrer la commande
                </button>
            </div>
        </section>
    </div>

</main>

</body>
</html>