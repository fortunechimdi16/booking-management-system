<?php include(__DIR__ . '/partials/header.php'); ?>

<div class="container mt-5">
    <h2 class="text-center mb-4">Search Results</h2>
    <?php if (!empty($reservations)): ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Confirmation Number</th>
                    <th>Guest Name</th>
                    <th>Check-in Date</th>
                    <th>Check-out Date</th>
                    <th>Total Cost</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($reservations as $reservation): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($reservation['confirmation_number']); ?></td>
                        <td><?php echo htmlspecialchars($reservation['guest_last_name']); ?></td>
                        <td><?php echo htmlspecialchars($reservation['checkin_date']); ?></td>
                        <td><?php echo htmlspecialchars($reservation['checkout_date']); ?></td>
                        <td>$<?php echo htmlspecialchars($reservation['total_cost']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <div class="alert alert-warning">No reservations found.</div>
    <?php endif; ?>
</div>

<?php include(__DIR__ . '/partials/footer.php'); ?>
