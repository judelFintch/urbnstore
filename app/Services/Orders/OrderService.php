<?php

namespace App\Services\Orders;

use App\Models\Order;
use Illuminate\Support\Facades\DB;

class OrderService
{
    /**
     * Créer une nouvelle commande.
     */
  
    /**
     * Mettre à jour une commande existante.
     */
    public function update(Order $order, array $data): Order
    {
        $order->update([
            'status' => $data['status'] ?? $order->status,
            'total_amount' => $data['total_amount'] ?? $order->total_amount,
            'notes' => $data['notes'] ?? $order->notes,
        ]);

        return $order;
    }

    /**
     * Supprimer une commande.
     */
    public function delete(Order $order): bool
    {
        return $order->delete();
    }

    /**
     * Récupérer une commande par son ID.
     */
    public function find(int $id): ?Order
    {
        return Order::find($id);
    }

    /**
     * Récupérer toutes les commandes paginées.
     */
    public function paginated($perPage = 10)
    {
        return Order::paginate($perPage);
    }

    /**
     * Changer le statut d'une commande.
     */
    public function updateStatus(Order $order, string $status): Order
    {
        $order->status = $status;
        $order->save();

        return $order;
    }

    public function getOrdersByUser($userId){
        return Order::where('user_id', $userId)->get();
    }


}
