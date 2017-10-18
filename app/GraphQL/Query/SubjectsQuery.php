<?php 
namespace App\GraphQL\Query;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Query;
use App\Models\Subject;

class SubjectsQuery extends Query {

	protected $attributes = [
		'name' => 'subjects'
	];

	public function type()
	{
		return Type::listOf(GraphQL::type('Subject'));
	}

	public function args()
	{
		return [
			'id' => ['name' => 'id', 'type' => Type::Int()],
			'code' => ['code' => 'code', 'type' => Type::string()]
		];
	}

	public function resolve($root, $args)
	{
		$where = function ($query) use ($args) {
            if (isset($args['id'])) {
                $query->where('id',$args['id']);
            }
            if (isset($args['code'])) {
                $query->where('code',$args['code']);
            }
        };

        $subjects = Subject::where($where)->get();

        return $subjects;
	}
}