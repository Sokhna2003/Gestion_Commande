<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Gestion Group Commandes</title>
</head>
<body class="bg-gray-100 font-sans">

    <div class="flex h-screen">
        <!-- SIDEBAR -->
        <aside class="w-64 bg-indigo-900 text-white flex flex-col">
            <div class="p-6 text-2xl font-bold border-b border-indigo-800">
                <a href="<?=path("dashboard","dashboard")?>">GES-COMMANDE</a>
            </div>
            <nav class="flex-1 p-4 space-y-2">
                <?php 
                    // Déterminer le controller actif
                    $currentController = $_REQUEST["controller"] ?? "client";
                ?>
                <a href="<?=path("dashboard","dashboard")?>" 
                   class="block py-2.5 px-4 rounded transition <?= $currentController == 'dashboard' ? 'bg-indigo-700' : 'hover:bg-indigo-800' ?>">
                    Dashboard
                </a>

                <!--  Cache les boutons "Clients" et "Produits" pour le simple CLIENT -->
                <?php if (hasRole('ADMIN')): ?>
                    <a href="<?=path("client","liste")?>" 
                       class="block py-2.5 px-4 rounded transition <?= $currentController == 'client' ? 'bg-indigo-700' : 'hover:bg-indigo-800' ?>">
                        Clients
                    </a>
                    <a href="<?=path("produit","liste")?>" 
                       class="block py-2.5 px-4 rounded transition <?= $currentController == 'produit' ? 'bg-indigo-700' : 'hover:bg-indigo-800' ?>">
                        Produits
                    </a>
                <?php endif; ?>

                <!-- Tout le monde (Admin et Client) peut voir ses commandes -->
                <a href="<?=path("commande","liste")?>" 
                   class="block py-2.5 px-4 rounded transition <?= $currentController == 'commande' ? 'bg-indigo-700' : 'hover:bg-indigo-800' ?>">
                    Commandes
                </a>
            </nav>
            <div class="px-6 py-2 text-sm">
                <p>Bonjour, <strong><?=$_SESSION["user"]["prenom"]?> <?=$_SESSION["user"]["nom"]?></strong></p>
            </div>
            <div class="pl-6 pb-2 flex items-center space-x-4">
                <a href="<?= path("auth", "logout") ?>" 
                    class="flex items-center space-x-3 px-4 py-2.5 rounded-lg text-sm font-medium text-red-600 hover:bg-red-50 hover:text-red-700 transition cursor-pointer">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                    <span>Déconnexion</span>
                </a>
            </div>
            <div class="p-4 border-t border-indigo-800 text-sm text-indigo-300">
                © 2024 Group Commandes 
            </div>
        </aside>

        <!-- CONTENT -->
        <main class="flex-1 overflow-y-auto">
            <?= $content ?>
        </main>
    </div>

</body>
</html>
