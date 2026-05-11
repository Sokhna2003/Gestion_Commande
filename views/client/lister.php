<?php 
         require_once __DIR__."/../../model/clientModel.php";
    //  require_once ("../model/clientModel.php");
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style type="text/tailwindcss">
      @theme {
        --color-clifford: #da373d;
      }
    </style>
    <title>Gestion Group Commandes</title>
</head>
<body class="bg-gray-100 font-sans">

    <div class="flex h-screen">
        <!-- SIDEBAR -->
        <aside class="w-64 bg-indigo-900 text-white flex flex-col">
            <div class="p-6 text-2xl font-bold border-b border-indigo-800">
                Admin Panel
            </div>
            <nav class="flex-1 p-4 space-y-2">
                <a href="#" class="block py-2.5 px-4 rounded bg-indigo-700 transition">Clients</a>
                <a href="#" class="block py-2.5 px-4 rounded hover:bg-indigo-800 transition">Produits</a>
                <a href="#" class="block py-2.5 px-4 rounded hover:bg-indigo-800 transition">Commandes</a>
            </nav>
            <div class="p-4 border-t border-indigo-800 text-sm text-indigo-300">
                © 2024 Group Commandes
            </div>
        </aside>

        <!-- MAIN CONTENT -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- HEADER -->
            <header class="flex items-center justify-between px-6 py-4 bg-white border-b">
                <h1 class="text-xl font-semibold text-gray-800">Liste des Clients</h1>
                <div class="flex items-center">
                    <button class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 transition">
                        + Nouveau Client
                    </button>
                </div>
            </header>

            <!-- TABLEAU CLIENTS -->
            <main class="flex-1 overflow-x-hidden overflow-y-auto p-6">
                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <table class="min-w-full leading-normal">
                        <thead>
                            <tr class="bg-gray-50 border-b border-gray-200">
                                <th class="px-5 py-3 text-left text-xs font-semibold text-gray-600 uppercase">ID</th>
                                <th class="px-5 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Client</th>
                                <th class="px-5 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Téléphone</th>
                                <th class="px-5 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Adresse</th>
                                <th class="px-5 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $clients = listerClient(); ?>
                            <?php foreach($clients as $c):?>
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-5 py-5 border-b border-gray-200 text-sm"><?= $c["id_client"] ?></td>
                                <td class="px-5 py-5 border-b border-gray-200 text-sm">
                                    <div class="flex flex-col">
                                        <span class="font-bold text-gray-900"><?= $c["prenom"]  . ' ' . $c["nom"]?></span>
                                        <span class="text-gray-500 italic"><?= $c["email"] ?></span>
                                    </div>
                                </td> 
                                <td class="px-5 py-5 border-b border-gray-200 text-sm"><?= $c["telephone"] ?></td>
                                <td class="px-5 py-5 border-b border-gray-200 text-sm"><?= $c["adresse"] ?></td>
                                <td class="px-5 py-5 border-b border-gray-200 text-sm">
                                    <button class="text-blue-600 hover:text-blue-900 mr-3">Modifier</button>
                                    <button class="text-red-600 hover:text-red-900">Supprimer</button>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>

</body>
</html>
