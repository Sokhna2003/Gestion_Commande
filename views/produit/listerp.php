<?php 
        //  require_once __DIR__."/../../model/produitModel.php";
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
    

    <?php require_once __DIR__."/../fixe/header.php" ?>


        <!-- MAIN CONTENT -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- HEADER -->
            <header class="flex items-center justify-between px-6 py-4 bg-white border-b">
                <h1 class="text-xl font-semibold text-gray-800">Liste des Potduits</h1>
                <div class="flex items-center">
                    <a href="?page=ajout">
                    <button class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 transition">
                        + Nouveau Produit
                    </button>
                    </a>
                </div>
            </header>

            <!-- TABLEAU CLIENTS -->
            <main class="flex-1 overflow-x-hidden overflow-y-auto p-6">
                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <table class="min-w-full leading-normal">
                        <thead>
                            <tr class="bg-gray-50 border-b border-gray-200">
                                <th class="px-5 py-3 text-left text-xs font-semibold text-gray-600 uppercase">ID</th>
                                <th class="px-5 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Produit</th>
                                <th class="px-5 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Prix</th>
                                <th class="px-5 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Stock</th>
                                <th class="px-5 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($produits as $p):?>
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-5 py-5 border-b border-gray-200 text-sm"><?= $p["id_produit"] ?></td>
                                <td class="px-5 py-5 border-b border-gray-200 text-sm">
                                    <div class="flex flex-col">
                                        <span class="font-bold text-gray-900"><?= $p["libelle"] ?></span>
                                        <span class="text-gray-500 italic"><?= $p["description"] ?></span>
                                    </div>
                                </td> 
                                <td class="px-5 py-5 border-b border-gray-200 text-sm"><?= $p["prix"] ?></td>
                                <td class="px-5 py-5 border-b border-gray-200 text-sm"><?= $p["stock"] ?></td>
                                <td class="px-5 py-5 border-b border-gray-200 text-sm">
                                    <a href="#">
    <button class="text-blue-600 hover:text-blue-900 mr-3">
        Modifier
    </button>
</a>
                                    <a href="#"><button class="text-red-600 hover:text-red-900">Supprimer</button></a>
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
