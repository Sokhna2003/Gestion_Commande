

  <!-- En-tête -->
  <header class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-8">
    <h2 class="text-2xl sm:text-3xl font-bold text-gray-900">Tableau de bord</h2>
    <p class="mt-1 text-sm text-gray-500">Vue d'ensemble du système de gestion de commandes.</p>
  </header>

  <!-- Cartes statistiques -->
  <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-6">
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
      <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 flex items-center space-x-4">
        <div class="flex-shrink-0 w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center text-blue-600 text-xl">👥</div>
        <div>
          <p class="text-sm font-medium text-gray-500">Clients</p>
          <p class="text-2xl font-bold text-gray-900"><?=$total_clients?></p>
        </div>
      </div>
      <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 flex items-center space-x-4">
        <div class="flex-shrink-0 w-12 h-12 bg-green-100 rounded-full flex items-center justify-center text-green-600 text-xl">📦</div>
        <div>
          <p class="text-sm font-medium text-gray-500">Produits</p>
          <p class="text-2xl font-bold text-gray-900"><?=$total_produits?></p>
        </div>
      </div>
      <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 flex items-center space-x-4">
        <div class="flex-shrink-0 w-12 h-12 bg-amber-100 rounded-full flex items-center justify-center text-amber-600 text-xl">📋</div>
        <div>
          <p class="text-sm font-medium text-gray-500">Commandes</p>
          <p class="text-2xl font-bold text-gray-900"><?=$total_commandes?></p>
        </div>
      </div>
    </div>
  </section>

  <!-- Accès rapides -->
  <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-8">
    <h3 class="text-lg font-semibold text-gray-900 mb-4">Accès rapides</h3>
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
      <a href="<?=path("client","liste")?>" class="block p-4 bg-white rounded-lg border border-gray-200 shadow-sm hover:shadow-md hover:border-indigo-300 transition">
        <span class="text-indigo-600 font-medium">👥 Gérer les clients</span>
        <p class="text-sm text-gray-500 mt-1">Ajouter, modifier ou supprimer des clients.</p>
      </a>
      <a href="<?=path("produit","liste")?>" class="block p-4 bg-white rounded-lg border border-gray-200 shadow-sm hover:shadow-md hover:border-indigo-300 transition">
        <span class="text-indigo-600 font-medium">📦 Gérer les produits</span>
        <p class="text-sm text-gray-500 mt-1">Ajouter, modifier ou supprimer des produits.</p>
      </a>
      <a href="<?=path("commande","liste")?>" class="block p-4 bg-white rounded-lg border border-gray-200 shadow-sm hover:shadow-md hover:border-indigo-300 transition">
        <span class="text-indigo-600 font-medium">📋 Gérer les commandes</span>
        <p class="text-sm text-gray-500 mt-1">Créer et suivre les commandes clients.</p>
      </a>
    </div>
  </section>

  <!-- Dernières commandes -->
  <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-8 mb-12">
    <h3 class="text-lg font-semibold text-gray-900 mb-4">Dernières commandes</h3>
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
      <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-50">
            <tr>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">N°</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Client</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Statut</th>
              <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Total</th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
            <?php foreach ($last3Commandes as  $commande) :?>
            <tr class="hover:bg-gray-50">
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"><a href="detail.html?id=1" class="text-indigo-600 hover:underline"><?=$commande["id_commande"]?></a></td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700"><?=$commande["nom_complet"]?></td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600"><?=$commande["date_commande"]?></</td>
              <td class="px-6 py-4 whitespace-nowrap"><span class="inline-flex px-2.5 py-0.5 rounded-full text-xs font-semibold bg-green-100 text-green-800"><?=$commande["statut"]?></</span></td>
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 text-right"><?=$commande["montant_total"]?></</td>
              
            </tr>
           <?php endforeach ?>

          </tbody>
        </table>
      </div>
      <div class="p-4 text-center border-t border-gray-100">
        <a href="<?=path("commande","liste")?>" class="text-sm text-indigo-600 hover:text-indigo-800 font-medium">Voir toutes les commandes →</a>
      </div>
    </div>
  </section>

