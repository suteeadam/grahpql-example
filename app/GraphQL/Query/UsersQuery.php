<?php 
namespace App\GraphQL\Query;

use GraphQL;
use GraphQL\Type\Definition\Type;
use GraphQL\Type\Definition\ResolveInfo;
use Folklore\GraphQL\Support\Query;
use App\Models\User;

class UsersQuery extends Query {

	protected $attributes = [
		'name' => 'users'
	];

	public function type()
	{
		return Type::listOf(GraphQL::type('User'));
	}

	public function args()
	{
		return [
			'id' => [
				'name' => 'id', 
				'type' => Type::Int()
			],
			'email' => [
				'name' => 'email', 
				'type' => Type::string()
			]
		];
	}

	public function resolve($root, $args)
	{
		$where = function ($query) use ($args) {
            if (isset($args['id'])) {
                $query->where('id', $args['id']);
            }
            if (isset($args['email'])) {
                $query->where('email', $args['email']);
            }
        };

        $user = User::where($where)->get();
        return $user; 

	}

}