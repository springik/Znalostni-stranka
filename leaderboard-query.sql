SELECT user_table.user_id as userID, user_table.username, subquery.completion_count, AVG(test_completion.percentage) as prumer_procent
FROM users as user_table
JOIN test_histories ON user_table.user_id = test_histories.user_id
JOIN test_completion ON test_completion.history_id = test_histories.history_id
LEFT JOIN
(
	SELECT COUNT(completion_id) as completion_count, test_histories.user_id
    FROM users
    JOIN test_histories ON users.user_id = test_histories.user_id
    JOIN test_completion ON test_completion.history_id = test_histories.history_id
    WHERE test_completion.percentage > 80
    GROUP BY test_histories.user_id
) as subquery
ON subquery.user_id = user_table.user_id
GROUP BY user_table.username
ORDER BY completion_count DESC, prumer_procent DESC
LIMIT 5;
